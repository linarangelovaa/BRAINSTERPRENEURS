<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Skill;
use App\Models\Academy;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $academies = Academy::get();
        $skills = Skill::get();
        return view('auth.register', compact('academies', 'skills'));
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:filter', 'max:255'],
            'password' => ['required'],
            'biography' => ['required']
        ]);
        if ($validation->fails()) {
            return response()->json(['data' => 400, 'msg' => $validation->errors()->all()]);
        }
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->biography = $request->biography;

        $user->save();
        return response()->json(['data' => ['user_id' => $user->id, 'step' => 2]]);
    }
    public function update(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'academy_id' => ['required']
        ]);

        if ($validation->fails()) {
            return response()->json(['data' => 400, 'msg' => $validation->errors()->all()]);
        }
        $user = User::find($request->user_id);
        $user->academy_id = $request->academy_id;
        $user->update();
        return  response(['data' => ['user_id' => $user->id, 'step' => 3]]);
    }
    public function update2(Request $request)
    {


        $validation = Validator::make($request->all(), [
            'skills' => ['required', 'array', 'min:5', 'max:10']
        ]);

        if ($validation->fails()) {
            return response()->json(['data' => 400, 'msg' => $validation->errors()->all()]);
        }
        $user = User::find($request->user_id);
        $user->skills()->attach($request->skills);

        /*         $user->skill_id = $request->skill_id;
 */
        $user->update();
        /*   return redirect()->route('register.update3'); */
        return response(['data' => ['user_id' => $user->id, 'step' => 4]]);
    }
    public function update3(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'image' => ['required']
        ]);


        if ($validation->fails()) {
            return response()->json(['data' => 400, 'msg' => $validation->errors()->all()]);
        }

        $path = 'images/upload/';
        $image = time() . '.' . $request->image->extension();
        $request->image->move($path, $image);
        $user = User::find($request->user_id);
        $user->image = "/" . $path . $image;

        $user->update();

        return response(['data' => [$user->id]]);

        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);


        /*  dd(request()->all());
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::find($request->user_id);
        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        }

        $user->image = $imageName;
        $user->path = '/storage/' . $path;
        $user->save(); */

        /*      return response()->json('Image uploaded successfully'); */
    }

    public function edit(User $user)
    {
        $skills = Skill::all();
        $users = User::get();

        $skill_id = $user->skills->pluck('id')->toArray();
        return view('auth.edit', compact('user', 'users', 'skills', 'skill_id'));
    }

    public function updateForUser(Request $request, User $user)
    {
        /*   dd($request->all()); */
        /*    $user = Auth::user(); */

        $request->validate([
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'biography' => ['required', 'string'],
            /*  'image' => ['required'], */
            'skills_ids' => ['required', 'array', 'min:5', 'max:10']
        ]);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->biography = $request->biography;

        /*  if ($request->image) {
            $path = 'images/upload/';
            $image = time() . '.' . $request->image->extension();
            $request->image->move($path, $image);
            $user->image = "/" . $path . $image;
        }
 */

        if ($user->update()) {
            $user->skills()->detach();
            foreach ($request->skills_ids as $skill_id) {
                $user->skills()->attach($skill_id);
            }
            return redirect()->route('dashboard');
        }
    }
}