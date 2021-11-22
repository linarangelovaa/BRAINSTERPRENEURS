<style>
    main {
        font-family: 'Montserrat';
        background-image: url('{{ '/images/3.jpg' }}') !important;
        background-repeat: no-repeat !important;
        background-size: auto;
        background-position: right bottom;
        margin: 5% 6% 0% 4%;
    }



    #navBorderDash {
        transform: rotate(-90deg);
        margin-left: 28%;
        margin-top: -73.6%;
        background-color: #dd7f1e;
        color: #dd7f1e;
        width: 2px;
        height: 2220px;
        margin-bottom: -70%;


    }

    .filterDiv {
        display: none;
    }

    .show {
        display: flex;
    }

    .btn.active {
        background-color: #48695c;
        color: white;
    }



    .wrapper a {
        display: inline-block;
        color: white;
        background-color: #48695c;
        padding: 2% 8%;
        border: none;
        text-transform: uppercase;
        border-radius: 10px;
        margin-top: 8%;
        margin-left: 73%;
        font-size: small;

    }

    .modal {
        visibility: hidden;
        opacity: 0;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15%;
        transition: all .4s;
    }

    .modal:target {
        visibility: visible;
        opacity: 1;
    }

    .modal__content {
        border-radius: 25px;
        position: relative;
        width: 500px;
        max-width: 90%;
        background-color: #f6f6f6;
        padding: 1em 2em;
    }

    .modal__footer {
        text-align: right;

        a {
            color: #585858;
        }

        i {
            color: #d02d2c;
        }
    }

    .modal__close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: black;
        text-decoration: none;
    }

    .widthAcademies,
    .paragraph1 {
        position: fixed;
    }

</style>

<x-app-layout>
    <x-slot name="header">


    </x-slot>
    <hr id="navBorderDash" class="navbar-sticky-top">


    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="main">
                        <div class="paragraph">
                            <p class="paragraph1">In what field can you be amazing? </p>

                            <i class="fas fa-reply fa-3x fa-rotate-270 iconDashboard"></i>
                            <p class="paragraph2">Checkout the latest projects</p>

                        </div>
                        <div class="flexForDashboard">
                            <div class="widthAcademies">

                                <div class="academyFilters " id="myBtnContainer">

                                    <button class="academy_class filterAcademies btn active"
                                        onclick="filterSelection('all')" checked="checked">All</button>
                                    @foreach ($academies as $academy)
                                        <button onclick="filterSelection('{{ $academy->name }}')"
                                            class="academy_class filterAcademies btn">{{ $academy->name }}</button>

                                    @endforeach
                                </div>

                            </div>

                            <div class="contentForCardonDashboard relative" id="contentForCards">
                                @foreach ($projects as $project)

                                    <div class="flexForCard filterDiv @foreach ($project->academies as $academy)
                                        {{ $academy->name }}
                                                     @endforeach"
                                        id="{{ $project->id }}">
                                        <div class="projectCardonDashboard">


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
                                                        <p class="lookingForParagraph">I'm looking for</p>

                                                    </div>


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
                                                    <div class="aplications">
                                                        <p class="numOfAplications">
                                                            {{ $project->applicants->count() }} Aplications</p>
                                                    </div>
                                                    <p class="projectName">{{ $project->name }}</p>
                                                    <p class="projectDesc showReadMore">
                                                        {{ $project->description }}
                                                    </p>
                                                    @if (in_array(
        $project->id,
        auth()->user()->applications()->pluck('projects.id')->toArray(),
    ))
                                                        <button type="button" class="grey IamInBtn">
                                                            I'm in
                                                        </button>
                                                    @else
                                                        <div class="wrapper">
                                                            <a id="{{ $project->id }}"
                                                                href="#demo-modal{{ $project->id }}">I'm in</a>


                                                        </div>
                                                        <div id="{{ $project->id }}">
                                                            <div id="demo-modal{{ $project->id }}"
                                                                class="modal">
                                                                <div class="modal__content">


                                                                    <form
                                                                        action="{{ route('app.store', ['id' => $project->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <p class="modalParagraph">
                                                                            Please tell us why you want to apply for
                                                                            this
                                                                            project
                                                                        </p>
                                                                        <textarea id="message" for="message" cols="55"
                                                                            rows="7" name="message"
                                                                            class="message"
                                                                            value="{{ old('message') }}"></textarea>
                                                                        <button type="submit" onclick="fireSweetAlert()"
                                                                            class="IamInBtn">Submit</button>
                                                                    </form>
                                                                    <a href="#" class="modal__close">&times;</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>




                                    </div>




                                @endforeach

                            </div>

                        </div>
                    </div>






                </div>


                {{ $projects->links() }}
            </div>
        </div>


    </div>


</x-app-layout>

<script>
    /*   $('.filterAcademies').click(function(e) {
        $('.filterAcademies').removeClass('active');
        $(this).addClass('active');
    });

    $(".academy_class").on("click", function() {
        $(this).css("background-color", "#48695c");
        $(this).css("color", "white");

        console.log(this)
        console.log($(this).data("id"))
    }); */

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
                '</span>&nbsp;&nbsp;  <a href="javascript:void(0)" id="btnExpand" class="ReadMore1">' +
                moretext +
                '</a></span>';
            $(this).html(Newhtml);

        }
    });
    $(".ReadMore1").click(function() {
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
</script>
<script>
    filterSelection("all")

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>

<script>
    $(document).ready(function() {

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $.ajax({
                url: "get_ajax_data?page=" + page,
                success: function(data) {
                    $('#contentForCards').html(data);
                }
            });
        }

    });
</script>

<script>
    $(document).ready(function() {
        function fireSweetAlert() {
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            )
        }
    });
</script>
