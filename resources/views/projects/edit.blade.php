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
    <div class="container1">
        <div class="navbar">
            <p class="brainsterTitle">brainster<span>preneus</span></p>
            <div class="navLinks">
                <a href="{{ route('projects.index') }}" class="aLinks active1">My Projects</a>
                <a href="#" class="aLinks">My Applications</a>
                @foreach ($users as $user)
                    @if ($user->id == Auth::id())
                        <a href="{{ route('auth.edit', $user->id) }}" class="aLinks">My Profile</a>
                    @endif
                @endforeach
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
        <div class="projectCreate">
            <div class="paragraphCreate">
                <h2>Edit Project</h2>
                <h2 class="h2Paragraph">What I need</h2>
            </div>
        </div>

        <form method="POST" id="projectForm" action="{{ route('projects.update', $project->id) }}">
            @method('put')
            @csrf
            <div class="projectCreate">
                <div class="flexProject">
                    <div class="projectDesc">
                        <input id="name" class=" forminputProject active1" type="name" name="name"
                            value="{{ $project->name }}" required placeholder="Name of project" />
                        <p class="desc">Description of project</p>
                        <textarea id="description" for="description" class="textArea active1" cols="60" rows="7"
                            name="description"
                            value="{{ $project->description }}">{{ $project->description }}</textarea>
                    </div>

                    <div class="academiesProject">
                        @foreach ($academies as $academy)

                            <input id="academy{{ $academy->id }}" class="Academy_class" value="{{ $academy->id }}"
                                data-id="{{ $academy->id }}" type="checkbox" name="academies_ids[]"
                                {{ in_array($academy->id, $academy_id) ? 'checked' : '' }} />
                            <label class="squareAcademy" for="academy{{ $academy->id }}"
                                value="{{ $academy->name }}">{{ $academy->name }}</label>
                        @endforeach


                    </div>
                </div>
                <p class="paragraphSelect">Please select no more than 4 options</p>
                <button type="submit" class="createProjectBtn" id="btnProject">Edit</button>
            </div>

        </form>





</body>


<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $(function() {


        $('.squareAcademy').click(function(e) {

            $(this).addClass('active');


        });

        $(".Academy_class").on("click", function() {
            $(this).css("background", "#48695c");
            $(this).css("color", "white");

            console.log(this)
            console.log($(this).data("id"))
        });
        $("input[type=checkbox]").each({
            $(this).is(':checked') {
                $(this).css('background-color', 'green');
            }
        });


        /*     $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#projectForm').on('submit', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let name = $('#name').val();
                let description = $('#description').val();
                let academiesList = new Array();
                $('.Academy_class:checked').each(function() {
                    academiesList.push($(this).attr('data-id'));

                });
                $.ajax({
                    url: "{{ route('projects.store') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        name: name,
                        description: description,
                        academies: academiesList,
                        project_id: localStorage.getItem("projectId")

                    },
                    dataType: 'json',
                    success: function(data) {
                        localStorage.setItem('projectId', data.data.project_id);
                        console.log(data);
                    },

                });
            }); */


    })
</script>


</html>
