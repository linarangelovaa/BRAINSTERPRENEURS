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
    .hide {
        display: none;
    }

    /*
    .flexCardAndButton:hover .myDIV {

    } */

    .flexCardAndButton:hover .hide {
        display: inline-block;
    }

</style>

<body>
    <div class="container">
        <div class="navbar">
            <p class="brainsterTitle">brainster<span>preneus</span></p>
            <div class="navLinks">
                <a href="{{ route('projects.index') }}" class="aLinks active1">My Projects</a>
                <a href="{{ route('app.index') }}" class="aLinks">My Applications</a>
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

        <div class="paragraphProjects">
            <p>Have a new idea to make the world better?</p>

            <a href="{{ route('projects.create') }}">
                <h2 class="createProjectParagraph">Create new project <i class="fas fa-plus plusIcon fa-lg"></i>
                </h2>
            </a>




            <div class="contentForCard">
                @foreach ($projects as $project)
                    <div class="flexCardAndButton ">
                        <div class="flexForCardProject myDIV" id="{{ $project->id }}">
                            <div class="projectCard ">


                                <div class="flexCard">
                                    <div class="cardFirstPart">
                                        <div class="profile-images-card2">
                                            <div class="profile-images2">

                                                <img src="{{ $project->user->image }}" id="image"
                                                    class="projectImage">
                                            </div>
                                        </div>
                                        <div>

                                            <p class="userName">{{ $project->user->name }}</p>
                                            <div class="userPosition">
                                                @if ($project->user->academy_id == 1)
                                                    <p>I'm Backend Developer</p>
                                                @elseif($project->user->academy_id == 2)
                                                    <p>I'm Frontend Developer</p>
                                                @elseif($project->user->academy_id == 3)
                                                    <p>I'm Marketer</p>
                                                @elseif($project->user->academy_id == 4)
                                                    <p>I'm Data Scientist</p>
                                                @elseif($project->user->academy_id == 5)
                                                    <p>I'm Designer</p>
                                                @elseif($project->user->academy_id == 6)
                                                    <p>I'm Quality Assurance Specialist</p>
                                                @elseif($project->user->academy_id== 7)
                                                    <p>I'm UX/UI Designer</p>
                                                @endif
                                            </div>

                                        </div>
                                        <p class="lookingForParagraphProject">I'm looking for</p>

                                        <div class="flexHalfCircle">

                                            @foreach ($project->academies as $academy)
                                                <div class="half-circle">
                                                    <p class="paragraphForProject"> {{ $academy->name }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>



                                    </div>
                                    <div class="cardSecondPart">
                                        <a class="" href="
                                            {{ route('projects.list', ['project' => $project->id]) }}">
                                            <div class="aplications">
                                                <p class="numOfAplications">{{ $project->applicants->count() }}
                                                    Aplications</p>

                                            </div>
                                        </a>
                                        <div>

                                            <p class="projectName">{{ $project->name }}</p>
                                            <p class="projectDesc showReadMore">{{ $project->description }}</p>



                                        </div>

                                    </div>


                                </div>

                            </div>


                        </div>

                        <div class="icons  hide">
                            <a href="{{ route('projects.edit', ['project' => $project->id]) }}"><i
                                    class="fas fa-pen  editIcon"></i></a>

                            <div class="spaceBetween">
                                <form action="{{ route('projects.destroy', ['project' => $project->id]) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btnDeleteIcon"> <i
                                            class="far fa-trash-alt   deleteIcon"></i></button>

                                </form>

                            </div>
                        </div>
                    </div>

                @endforeach


            </div>

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
        let moretext = "Read more";
        let lesstext = "Read less";
        $(".showReadMore").each(function() {
            let myStr = $(this).text();
            if ($.trim(myStr).length > maxLength) {
                let newStr = myStr.substring(0, maxLength);
                let removedStr = myStr.substr(maxLength, $.trim(myStr).length - maxLength);
                let Newhtml = newStr + '<span class="moreellipses">' + ellipsestext +
                    '</span><span class="morecontent"><span>' + removedStr +
                    '</span>&nbsp;&nbsp;  <a href="javascript:void(0)" id="btnExpand" class="ReadMore">' +
                    moretext +
                    '</a></span>';
                $(this).html(Newhtml);

            }
        });
        $(".ReadMore").click(function() {
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
        /*
                $(".flexForCard").hover(function() {
            $(".box-right").toggleClass('icons');

          }); */

        /*       $(".flexForCard").hover(function() {
                  var data_id = $(this).data('id');

                  // Shows the hovered floorplan, hides others
                  $('.icons').each(function() {
                      var el = $(this);

                      if (el.attr('id') == data_id)
                          el.show();
                      else
                          el.hide();
                  });
              }); */

    });
</script>


</html>
