<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\Academy;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $projects = Project::where('user_id', '=', Auth::id())->get()->sortByDesc('created_at');
        return view('projects.index', compact('users', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::get();
        $academies = Academy::all();
        return view('projects.create', compact('academies', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'academies_ids' => ['required', 'array', 'min:1', 'max:4']
        ]);
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id

        ]);
        if ($project->save()) {
            foreach ($request->academies_ids as $academy_id) {
                $project->academies()->attach($academy_id);
            }
            return redirect()->route('projects.index');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $project = Project::findOrFail($id);

        $projects = auth()->user()->applications;
        $skills = Skill::all();
        $users = $project->applicants;
        $user = $project->applicants();

        return view('projects.show', compact('users', 'user', 'project', 'projects'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $users = User::get();
        $academies = Academy::all();
        $academy_id = $project->academies->pluck('id')->toArray();
        /*   $project = Project::find($id); */
        return view('projects.edit', compact('academy_id', 'project', 'users', 'academies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Project $project)
    {

        /*
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string', 'min:700', 'max:1000'],
            'academies_ids' => ['required', 'array', 'min:1', 'max:4']
        ]); */

        $project->name = $request->name;
        $project->description = $request->description;


        if ($project->update()) {
            $project->academies()->detach();
            foreach ($request->academies_ids as $academy_id) {
                $project->academies()->attach($academy_id);
            }


            return redirect()->route('projects.index');
        }
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }

    public function list($id)
    {

        $project = Project::findOrFail($id);

        $projects = auth()->user()->applications;

        $users = $project->applicants;
        $user = Auth::user()->id;


        return view('projects.list', compact('users', 'user', 'project', 'projects'));
    }
}
