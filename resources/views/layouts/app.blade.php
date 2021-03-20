<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
            html, body {
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

            .title {
                font-size: 84px;
            }

            .links > a {
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
            .navBar{
                list-style: none;
                display: flex ;
                justify-content: flex-end;
                margin: 0;
                background-color: #2A3F54;
                position: fixed;
                width: 100%;
                padding: 5px;
                position: absolute;
                
            }
            .navBar li{
                display: block;
                margin: 2px;
                float: right;

            }
            .banner{
                width: 100%;
                height: 100vh;
               
            }
            
            .action{
                position: absolute;
                top: 35%;
                left: 10%;
                display: flex;
                flex-direction: column;
                
                
            }
            .action img{
                height: 20vh;
                margin-bottom: 10px;

            }
     
        </style>
</head>
<body>
    <ul class="navBar" >
            @if (Route::has('login'))
                <div class="">
                    @auth
                    <li>
                        <a href="{{ url('/home') }}">
                        <div class="btn btn-info">

                            My Wallet
                        </div>
                        @if (Auth::User()->is_admin)
                        <li>
                            <a href="/admin"> <div class="btn btn-info">Admin-Dashboared</div></a>
                            </li>
                        @endif
                    
                    </a>
                    </li>
                    @else
                    <li>
                        
                        <a href="{{ route('login') }}">
                        <div class="btn btn-success">Login
                        </div>
                        </a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}"> <div class="btn btn-info">Register</div></a>
                            </li>
                        @endif
                        
                        
                    @endauth
                </div>
            @endif

        </ul>
    <div style="height: 100%; display:flex ;align-items:center;justify-content:center;background-image: url('../build/images/pexels-maxime-francis-2246476.jpg'); background-size:cover"  id="app ">
        <main class="">
            @yield('content')
        </main>
        
    </div>
</body>
</html>
