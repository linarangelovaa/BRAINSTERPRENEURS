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
    button[type=button]+.card {
        background-color: white !important;

    }

    button[type=button]:checked+.card {
        background-color: #grey !important;

    }

</style>


<body>
    <div class="container2">
        <div class="navbar">
            <p class="brainsterTitle">brainster<span>preneus</span></p>
            <div class="navLinks">
                <a href="{{ route('projects.index') }}" class="aLinks active1">My Projects</a>
                <a href="{{ route('app.index') }}" class="aLinks">My Applications</a>
                @if ($project->user->id == Auth::user()->id)
                    <a href="{{ route('auth.edit', $project->user->id) }}" class="aLinks">My Profile</a>
                @endif
            </div>
            <a href="{{ route('projects.index') }}" class="profileImage">
                <div class="profile-images-card1">
                    <div class="profile-images1">
                        @if ($project->user->id == Auth::user()->id) <img
                                src="{{ $project->user->image }}" id="image">
                        @endif
                    </div>
                </div>
            </a>
        </div>
        <hr id="navBorder">
        <div class="flex">
            <div class="part1">
                <div class="paragraphProjects">
                    <h2 id="{{ $project->id }}">{{ $project->name }} - Applicants</h2>
                    <div class=" flexProject">
                        <h3 class=" createProjectParagraph">Choose your teammates
                        </h3><i class="fas fa-share fa-3x fa-rotate-90 iconApp"></i>
                    </div>
                </div>
            </div>
            <div class="part2">
                <div>
                    <p class="paragraphOnList">Ready to start?</p>
                    <p class="paragraphOnList">Click on the button below</p>
                    <form action="{{ route('app.update', ['id' => $project->id]) }}" id="form1" method="POST">
                        @method('PUT')
                        @csrf
                        <button id="btnTeamAsembled" class="btnTeam">TEAM ASEMBLED <i class="fas fa-check"></i>
                            {{-- <button type="submit" id="{{ $user->id }}" class="btnPlusApp "><i
                                class="fas fa-plus iconAppPlus"></i></button> --}}
                    </form>


                    </button>
                </div>
            </div>

        </div>


        <div class="contentForAppCards">
            @foreach ($users as $user)

                <div class="card white" id="{{ $user->id }}">

                    <div class="cardContent">
                        <div class="profile-image-AppCard">
                            <div class="profile-AppImage">

                                <img src=" {{ $user->image }}" id="image">

                            </div>

                        </div>
                        <a href=" {{ route('users.show', $user->id) }}" class="aUserName">
                            <p class="appName"> {{ $user->name }} </p>
                        </a>

                        @if ($user->academy_id == 1)
                            <p class="appAcademy"> Backend Developer</p>
                        @elseif($user->academy_id == 2)
                            <p class="appAcademy"> Frontend Developer</p>
                        @elseif($user->academy_id == 3)
                            <p class="appAcademy"> Marketer</p>
                        @elseif($user->academy_id == 4)
                            <p class="appAcademy">Data Scientist</p>
                        @elseif($user->academy_id == 5)
                            <p class="appAcademy">Designer</p>
                        @elseif($user->academy_id == 6)
                            <p class="appAcademy">Quality Assurance Specialist</p>
                        @elseif($user->academy_id== 7)
                            <p class="appAcademy">UX/UI Designer</p>
                        @endif

                        <p class="appMail">{{ $user->email }}</p>

                        <p class="appMessage">{{ $user->pivot->message }} </p>

                        <form action="{{ route('app.update', ['id' => $project->id]) }}" id="form1" method="POST">
                            @method('PUT')
                            @csrf
                            <button type="submit" id="{{ $user->id }}" class="btnPlusApp "><i
                                    class="fas fa-plus iconAppPlus"></i></button>
                        </form>


                    </div>
                </div>


            @endforeach
        </div>


    </div>
















</body>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#btnTeamAsembled").click(function() {

        })
    })
</script>


</html>
