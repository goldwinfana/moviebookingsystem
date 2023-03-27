<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Funner Movies</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Main Stylesheet File -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                display: grid;
                height: auto;
            }
            a{
                color: white;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center ">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block" style="padding: 15px;background: grey;z-index: 99;width: 100%;text-align: end;position: fixed">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 ">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-white">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
{{--  Films          --}}
       <div id="movies" class="movies-area area-padding bg-gray-400" style="margin-bottom: 25px">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="section-headline text-center">
                                    <h2>Movies</h2>
                                </div>
                            </div>
                        </div>


                        <div class="row movser" style="display: contents;">
                            @foreach($movies as $movie)
                                <a href="#{{$movie['title']}}" id="{{$movie['movie_id']}}" class="select_movie">
                                    <div class="cover-body" style=" background-image: url('{{asset('images/'.$movie['image'])}}');">
                                        <div class="movies-move">
                                            <div class="series-details">
                                                <div class="single-series">
                                                    <p class="cover-content-bottom">{{$movie['title']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>


                    </div><br>
                </div>

{{--  End Films          --}}
  <div style="height:25px;width: 100%"></div>
    </body>
</html>
@include('modals.guest')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
{{--     Scripts   --}}
<script src="{{ asset('js/main.js') }}"></script>
