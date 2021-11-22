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

<body>
    <div class="containerShow">
        <div class="navbar">
            <p class="brainsterTitle">brainster<span>preneus</span></p>
            <div class="navLinks">
                <a href="{{ route('projects.index') }}" class="aLinks active1">My Projects</a>
                <a href="{{ route('app.index') }}" class="aLinks">My Applications</a>
                {{-- @foreach ($projects as $project) --}}
                @if ($project->user->id == Auth::user()->id)
                    <a href="{{ route('auth.edit', $project->user->id) }}" class="aLinks">My Profile</a>
                @endif
                {{-- @endforeach --}}


            </div>
            <a href="{{ route('projects.index') }}" class="profileImage">
                <div class="profile-images-card1">
                    <div class="profile-images1">
                        {{-- @foreach ($projects as $project) --}}
                        @if ($project->user->id == Auth::user()->id) <img
                                src="{{ $project->user->image }}" id="image">
                        @endif
                        {{-- @endforeach --}}

                    </div>
                </div>
            </a>
        </div>
        <hr id="navBorder">
        {{-- @foreach ($projects as $project) --}}
        {{-- @foreach ($users as $user) --}}
        {{-- @if ($project->user->id == $user->id) --}}
        <div id="{{ $project->user->id }}">
            <div class="flex">
                <div class="part1Show">
                    <div class="flex">
                        <div class="contentForImage">
                            <div class="imageProfile4">
                                <div class="profile-images-card4">
                                    <div class="profile-images4">
                                        <img src="{{ $user->image }}" id="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contentForInfo">
                            <p class="showName">Name:</p>
                            <p class="showNameUser"> {{ $user->name }} </p>
                            <p class="showContact">Contact:</p>
                            <p class="showMailUser">{{ $user->email }} </p>

                        </div>
                    </div>
                </div>

                <div class="part2Show">
                    <div class="userBio">
                        <p class="userBioParagraph">Biography:</p>
                        <p class="showReadMore">{{ $user->biography }} </p>
                    </div>
                    <div class="
                                userSkills">
                        <p class="userSkillParagraph">Skills:</p>
                        <div class="skillsUser">
                            @foreach ($user->skills as $skill)

                                <input id="academy{{ $skill->id }}" class="Academy_class"
                                    value="{{ $skill->id }}" data-id="{{ $skill->id }}" type="checkbox"
                                    name="academies_ids[]" />
                                <label class="squareSkillUser" for="academy{{ $skill->id }}"
                                    value="{{ $skill->name }}">{{ $skill->name }}</label>
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{-- @endif --}}

        {{-- @endforeach --}}
        {{-- @endforeach --}}

    </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $(document).ready(function() {

        let maxLength = 600;
        let ellipsestext = "...";
        let moretext = "Show more";
        let lesstext = "Show less";
        $(".showReadMore").each(function() {
            let myStr = $(this).text();
            if ($.trim(myStr).length > maxLength) {
                let newStr = myStr.substring(0, maxLength);
                let removedStr = myStr.substr(maxLength, $.trim(myStr).length - maxLength);
                let Newhtml = newStr + '<span class="moreellipses">' + ellipsestext +
                    '</span><span class="morecontentBio"><span>' + removedStr +
                    '</span>&nbsp;&nbsp;  <a href="javascript:void(0)" id="btnExpand" class="ReadMoreBio">' +
                    moretext +
                    '</a></span>';
                $(this).html(Newhtml);

            }
        });
        $(".ReadMoreBio").click(function() {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });


    });
</script>


</html>
