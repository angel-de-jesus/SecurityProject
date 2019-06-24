<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
        body{
  background-image: url("https://image.freepik.com/foto-gratis/fondo-textura-papel-gris-claro-blanco_7190-913.jpg");
  background-position:center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
            /* html, body {
                background-color:#F5F5F5;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                
            } */
            /* imagen */
            .ha{
                width: 350px;
                height: 190px;
                margin-left: 85px;
                border-radius:15px;
                border-color: blue;
                margin-top:25px;
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
                color:		#00008B;
                font-family: Arial, Helvetica, sans-serif;
            }

            .title {
                font-size: 20pt;
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
         @media (min-width: 300px) { 
            .card{
                width:370px;
            }
            .row2{
                width:345px;
    
            }
            .row{
                width:100%;

            } 
            .card{
                width: 40%
            }
            #bsc{
                margin-left: 18px;
            }
            .btn_input{
                margin-left:20%;
    
            }
            .title{
                font-size:20pt;
            }
           
        }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   <strong> SecurityProject</strong>
                </div>
                <div class="descripcion">
                    <p>SecurityProject es una plataforma web donde diversos usuarios pueden acceder de forma gratuita<br>
                    con el fin de buscar, colaborar y prevenir actos de delincuencia
                </div>
                <div class="ha">
                <img class="ha" src="https://www.google.com/maps/d/thumbnail?mid=1443Cs6P9VFfe1e7IBlpAgTRRtBU&hl=es" alt="">
                </div>
                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
    </body>
</html>
