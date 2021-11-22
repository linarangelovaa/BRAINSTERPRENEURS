<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/2adeb4644b.js" crossorigin="anonymous"></script>
</head>
<style>
    input[type=checkbox]+label {
        background-color: white !important;
        color: black !important;
    }

    input[type=checkbox]:checked+label {
        background-color: #48695c !important;
        color: white !important;
    }

</style>

<body>

    @foreach ($users as $user)
        @if ($user->id == Auth::id())
            <div class="containerProfile">
                <div class="navbar">
                    <p class="brainsterTitle">brainster<span>preneus</span></p>
                    <div class="navLinks">
                        <a href="{{ route('projects.index') }}" class="aLinks">My Projects</a>
                        <a href="{{ route('app.index') }}" class="aLinks">My Applications</a>
                        {{-- @if ($user->id == Auth::id()) --}}
                        <a href="{{ route('auth.edit', $user->id) }}" class="aLinks  active1">My Profile</a>
                        {{-- @endif --}}
                    </div>
                    <a href="{{ route('projects.index') }}" class="profileImage">
                        <div class="profile-images-card1">
                            <div class="profile-images1">
                                @foreach ($users as $user)
                                    @if ($user->id == Auth::id())
                                        <img src="{{ $user->image }}" id="image">
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </a>
                </div>
                <hr id="navBorder">
                @foreach ($users as $user)
                    @if ($user->id == Auth::id())
                        <form method="POST" id="userForm" action="{{ route('auth.updateForUser', $user->id) }}">
                            @method('put')

                            @csrf

                            <div class="myProfile">
                                <div class="praragraphProfile">
                                    <h2>My Profile</h2>
                                    <div class="flex">
                                        <div class="imageProfile3">
                                            <div class="profile-images-card3">
                                                <div class="profile-images3">

                                                    <img src="{{ asset($user->image) }}" id="image">

                                                </div>

                                            </div>
                                            <div class="custom-file">
                                                <label for="fileupload" class="clickImageParagraph">Click here to
                                                    upload an
                                                    image</label>
                                                <input type="file" id="fileupload" name="image">
                                            </div>
                                        </div>

                                        {{-- <div class="custom-file">
                                    <label class="imageParagraph" for="fileupload">Click here to upload an image</label>
                                    <input type="file" id="fileupload" name="image">


                                </div> --}}

                                        <div class="inputProfile">
                                            <input id="name" class=" forminputProfile active1" type="text" name="name"
                                                value="{{ $user->name }}" required autofocus />
                                            <input id="surname" class=" forminputProfile active1" type="text"
                                                name="surname" value="{{ $user->surname }}" required autofocus />

                                            <input id="email" class=" forminputProfile active1" type="text" name="email"
                                                value="{{ $user->email }}" required autofocus />


                                        </div>

                                    </div>
                                    <div class="paragraphBio">
                                        <p class=" active1">Biography</p>
                                        <textarea id="profileBiography" for="biography" cols="60" rows="7"
                                            value="{{ $user->biography }}" class=" active1"
                                            name="biography">{{ $user->biography }}</textarea><br>



                                    </div>

                                </div>
                                <div class="praragraphProfileSkills">
                                    <h2 class="skillParagraph">Skills</h2>
                                    <div class="boxesSkillsProfile">
                                        @foreach ($skills as $skill)
                                            <input id="skill{{ $skill->id }}" class="skill_class"
                                                value="{{ $skill->id }}" data-id="{{ $skill->id }}"
                                                type="checkbox" name="skills_ids[]"
                                                {{ in_array($skill->id, $skill_id) ? 'checked' : '' }} />
                                            <label class="squareSkillsProfile" value="{{ $skill->name }}"
                                                for="skill{{ $skill->id }}">{{ $skill->name }}</label>

                                        @endforeach



                                    </div>

                                    <button class="btnEdit" type="submit" id="btnEdit">Edit</button>

                                </div>

                            </div>

                        </form>
                    @endif
                @endforeach
            </div>

        @endif
    @endforeach






</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="js/jquery-latest.min.js"></script>

<script>
    $(function() {
        $("#fileupload").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#image").attr("src", x);
            console.log(event);
        });
    });
</script>


</html>
