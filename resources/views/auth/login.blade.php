<style>
    body {
        font-family: 'Montserrat';
        background-image: url('{{ asset('/images/1.jpg') }}') !important;
        background-repeat: no-repeat !important;
        background-size: auto;
    }


    #brainsterTitle {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 250%;
        margin: 2% 0%;


    }

    span {
        color: #949d99;
    }

    .brainsterpreneurs {
        padding-left: 8%;
        padding-top: 10%;
    }

    .login {
        display: flex;
        align-items: start;
        flex-direction: column;
        margin-left: 60%;
        margin-top: -3%;
    }

    .inputLogin {
        border: 0;
        outline: 0;
        margin: 4%;

        border-bottom: 5px solid black;
        border-radius: 3px;
        width: 90%;
        background-color: #f6f6f6 !important;
    }

    h2 {
        font-weight: bold;
    }

    .loginBtn {
        color: white;
        background-color: #dd7f1e;
        text-transform: uppercase;
        border: none;
        padding: 7px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
        margin: 4px 2px;
        margin-left: 61%;
        margin-top: 2%;

    }

    #login {
        font-size: 250%;
        font-weight: bold;
        padding: 0px;
        margin: 2%;
    }

    #registerLink {
        font-size: 90%;
    }

</style>
<x-guest-layout>
    <div class="brainsterpreneurs">
        <p id="brainsterTitle">brainster<span>preneus</span></p>
        <h2>Popel your ideas in life!</h2>
    </div>
    <x-auth-card>


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="login">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="">
                    <p id="login">Login</p><br>

                    <x-input id="email" class=" mt-1  inputLogin" type="email" name="email" :value="old('email')"
                        required />
                </div>

                <!-- Password -->
                <div class="my-4">


                    <x-input id="password" class=" mt-1  inputLogin" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="loginBtn">
                        {{ __('Login') }}
                    </x-button>
                </div>
                <p id="registerLink" class="registerLink">Dont't have an account,register <a
                        href="{{ route('register') }}">here</a>!
                </p>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
