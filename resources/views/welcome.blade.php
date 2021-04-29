<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VLC99TP2BK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VLC99TP2BK');
    </script>



    <title>Welcome - MOM</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;


        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .line-break {
            line-height: 80px;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>



</head>

<body>

    <div class="flex-center position-ref lead">
        @if (Route::has('login'))
        <div class="top-right links">




            @auth
            <a href="{{ url('/mallwp') }}">Home</a>
            @else
            <a href="{{ route('login') }}"><strong><mark>Login</mark></strong></a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"><strong><mark>Register</mark></strong></a>
            @endif
            @endauth


        </div>
        @endif






    </div>
    <br>
    <br>
    <br class="line-break">

    <div align="center">
        <img src="mallhome12.PNG" style="max-width:100%;height:auto;">
    </div>
    <div align="center">


        <h2>Work Permit</h2>
    </div>
</body>

</html>