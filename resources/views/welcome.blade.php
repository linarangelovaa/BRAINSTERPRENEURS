<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>




    <style>
        body {
            font-family: 'Montserrat';
            background-image: url('{{ asset('/images/1.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
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
            margin-left: 10%;
            margin-top: 13%;
        }

        .login {
            display: flex;
            align-items: start;
            flex-direction: column;
            margin-left: 67%;
            margin-top: 0%;
        }

        input {
            border: 0;
            outline: 0;
            margin: 1%;
            background: transparent;
            border-bottom: 5px solid black;
            border-radius: 3px;
            width: 50%;
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
            margin-left: 34%;
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
</head>

<body>
    <div class="brainsterpreneurs">
        <p id="brainsterTitle">brainster<span>preneus</span></p>
        <h2>Popel your ideas in life!</h2>
    </div>

    <div class="login">
        <p id="login">Login</p>
        <input for="email" type="email" placeholder="Email">
        <input for="password" type="text" placeholder="Password">
        <button class="loginBtn">Login</button>
        <p id="registerLink">Dont't have an account,register <a href="{{ route('login') }}">here</a>!</p>

    </div>

</body>

</html>
