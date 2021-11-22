<x-guest-layout>
    {{-- <form id="contactForm"> --}}
    <div class="registerFirst">
        <form method="POST" id="firstForm" action="{{ route('register.store') }}">


            <div class="regiserFirstForm">
                <p class="title">Register</p>
                <x-auth-card>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <!-- Name -->
                    <div>
                        <x-input id="name" class=" mt-1 w-full forminput" type="text" name="name" :value="old('name')"
                            required autofocus placeholder="Name" />
                        <span class="text-danger" id="nameError"></span>
                        <!-- Surname -->
                        <x-input id="surname" class=" mt-1 w-full forminput" type="text" name="surname"
                            :value="old('surname')" required autofocus placeholder="Surname" /><br>
                        <span class="text-danger" id="surnameError"></span>
                        <!-- Email Address -->
                        <x-input id="email" class=" mt-1 w-full forminput" type="email" name="email"
                            :value="old('email')" required placeholder="Email" />
                        <span class="text-danger" id="emailError"></span>
                        <!-- Password -->
                        <x-input id="password" class=" mt-1 w-full forminput" type="password" name="password" required
                            autocomplete="new-password" placeholder="Password" />
                        <span class="text-danger" id="passwordError"></span>
                    </div>
                    <p class="bio">Biography</p>
                    <textarea id="biography" class="textArea" for="biography" cols="60" rows="7" name="biography"
                        placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."></textarea><br>
                    <span class="text-danger" id="biographyError"></span>
                    <button type="submit" class="btnNext" id="btnFirst">Next</button>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        </form>

        </x-auth-card>
    </div>


    </div>

    <div class="registerSecond">
        <form method="POST" id="secondForm" action="{{ route('register.update') }}">

            {{-- @method('PUT') --}}

            <div class="regiserFirstForm">
                <div class="academies">
                    <p class="title" id="academyTitle">Academies</p>
                    <hr class="hrAcademies">
                </div>
                <p class="academiesParagraph">Please select one of the academies listed below
                </p>
            </div>

            <div class="boxesAcademies" id="academies">
                @foreach ($academies as $academy)
                    <input id="{{ $academy->id }}" class="academy_class" type="radio" data-id="{{ $academy->id }}"
                        name="academy_id" />
                    <label class="squareAcademies" for="{{ $academy->id }}">{{ $academy->name }}</label>
                    {{-- <div id="academy_id" data-id="{{ $academy->id }}" class="squareAcademies">
                        {{ $academy->name }} --}}
                    {{-- </div> --}}
                @endforeach
            </div>





            <button type="submit" class="btnNext2" id="btnSecond">Next</button>
        </form>

    </div>

    <div class="registerThird">
        <form method="POST" id="thirdForm" action="{{ route('register.update2') }}">

            <div class="regiserFirstForm">
                <div class="academies">
                    <p class="title" id="academyTitle">Skills</p>
                    <hr class="hrSkills">
                </div>
                <p class="skillsParagraph">Please select your skills set
                </p>
            </div>
            <div class="boxesSkills">
                @foreach ($skills as $skill)
                    <input id="skill{{ $skill->id }}" class="skill_class" data-id="{{ $skill->id }}"
                        type="checkbox" name="skill_id" />
                    <label class="squareSkills" for="skill{{ $skill->id }}">{{ $skill->name }}</label>

                @endforeach
            </div>
            <button class="btnNext3" type="submit" id="btnThird">Next</button>
        </form>
    </div>
    <div class="registerFourth">
        <form method="POST" id="fourthForm" action="{{ route('register.update3') }}">
            @csrf
            <div class="regiserFirstForm">
                <div class="academies">
                    <p class="title" id="academyTitle">Your profile image</p>
                    <hr class="hrAcademies">
                </div>
                <div class="profile-images-card">
                    <div class="profile-images">
                        <img src="images/profile.png" id="image">
                    </div>
                </div>
                <div class="custom-file">
                    <label class="imageParagraph" for="fileupload">Click here to upload an image</label>
                    <input type="file" id="fileupload" name="image">
                    <input type="hidden" id="hiddenInput" name="user_id">

                </div>
            </div>

            <button type="submit" class="btnNext4" id="btnFourth">Finish</button>
        </form>


    </div>
    {{-- <div class="registerFourth">
        <form action="{{ route('register.update3') }}" method="post" enctype="multipart/form-data" id="form">
            @csrf

            <div class="form-group">
                <label for="">Product image</label>
                <input type="file" name="product_image" class="form-control">
                <span class="text-danger error-text product_image_error"></span>
            </div>
            <div class="img-holder"></div>
            <button type="submit" class="btn btn-primary">Save Product</button>
        </form>
    </div> --}}


</x-guest-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="js/jquery-latest.min.js"></script>
<script>
    $(function() {


        $("#fileupload").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#image").attr("src", x);
            console.log(event);
        });


        $('.squareAcademies').click(function(e) {
            $('.squareAcademies').removeClass('active');
            $(this).addClass('active');
        });

        $(".academy_class").on("click", function() {
            $(this).css("background", "#48695c");
            $(this).css("color", "white");

            console.log(this)
            console.log($(this).data("id"))
        });


        $('.squareSkills').click(function(e) {

            $(this).addClass('active');


        });


        $(".skill_class").on("click", function() {
            $(this).css("background", "#48695c");
            $(this).css("color", "white");

            console.log(this)
            console.log($(this).data("id"))
        });


        $('.registerSecond').hide()
        $('.registerThird').hide()
        $('.registerFourth').hide()

        $(".btnNext").on("click", function() {
            $('.registerSecond').show()
            $('.registerFirst').hide()
            $('.registerThird').hide()
            $('.registerFourth').hide()
        });
        $(".btnNext2").on("click", function() {
            $('.registerThird').show()
            $('.registerFirst').hide()
            $('.registerSecond').hide()
            $('.registerFourth').hide()
        });

        $(".btnNext3").on("click", function() {
            $('.registerFourth').show()
            $('.registerFirst').hide()
            $('.registerSecond').hide()
            $('.registerThird').hide()
        });

        $('#firstForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let name = $('#name').val();
            let surname = $('#surname').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let biography = $('#biography').val();

            $.ajax({
                url: "{{ route('register.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    surname: surname,
                    email: email,
                    password: password,
                    biography: biography,
                },
                dataType: 'json',
                success: function(data) {
                    localStorage.setItem('userId', data.data.user_id);
                    console.log(data.data.user_id);
                },
                error: function(data) {
                    printErrorMsg(data.error);

                },


            });
        });


        $('#secondForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let academy_id = $('.academy_class:checked').attr('data-id');

            console.log(academy_id)
            $.ajax({
                url: "{{ route('register.update') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    academy_id: academy_id,
                    user_id: localStorage.getItem("userId")
                },
                dataType: 'json',
                success: function(data) {
                    localStorage.setItem('userId', data.data.user_id);
                    console.log(data);
                },
                error: function(data) {
                    printErrorMsg(data.error);

                },

            });
        });

        $('#thirdForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let skillsList = new Array();
            $('.skill_class:checked').each(function() {
                skillsList.push($(this).attr('data-id'));
            });
            $.ajax({
                url: "{{ route('register.update2') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    skills: skillsList,
                    user_id: localStorage.getItem("userId")

                },
                dataType: 'json',
                success: function(data) {
                    localStorage.setItem('userId', data.data.user_id);
                    $('#hiddenInput').val(data.data.user_id);
                    console.log(data);
                },
                error: function(data) {
                    printErrorMsg(data.error);

                },

            });
        });

        $('#fourthForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('register.update3') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    localStorage.setItem('userId', response.data.user_id);
                    window.location.href = "{{ route('dashboard') }}";
                    console.log(response);
                },
                error: function(data) {
                    printErrorMsg(data.error);

                },

            });


            /* function printErrorMsg(msg) {

                $(".print-error-msg").find("ul").html('');

                $(".print-error-msg").css('display', 'block');

                $.each(msg, function(key, value) {

                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

                });

            } */
        });
        /*
                $('#form').on('submit', function(e) {
                    e.preventDefault();
                    var form = this;
                    $.ajax({
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: new FormData(form),
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        beforeSend: function() {
                            $(form).find('span.error-text').text('');
                        },
                        success: function(data) {
                            if (data.code == 0) {
                                $.each(data.error, function(prefix, val) {
                                    $(form).find('span.' + prefix + '_error').text(val[0]);
                                });
                            } else {
                                $(form)[0].reset();
                                // alert(data.msg);
                                fetchAllProducts();
                            }
                        }
                    });
                }); */



        /*
                $('#fourthForm').submit(function(e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    let formData = new FormData(this);
                    $('#image-input-error').text('');
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('register.update3') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            formData: formData,
                            user_id: localStorage.getItem("userId"),
                        },
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: (response) => {
                            if (response) {
                                this.reset();
                                localStorage.setItem('userId', response);
                                alert('Image has been uploaded successfully');
                            }
                        },
                        error: function(response) {
                            console.log(response);
                            $('#image-input-error').text(response.responseJSON.errors.file);
                        }
                    });






                }) */

    })
</script>
