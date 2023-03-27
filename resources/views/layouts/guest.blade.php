<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


        <link href="https://goldwinfana.github.io/funnermovies/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
        <link href="https://goldwinfana.github.io/funnermovies/lib/owlcarousel/owl.carousel.css" rel="stylesheet">
        <link href="https://goldwinfana.github.io/funnermovies/lib/owlcarousel/owl.transitions.css" rel="stylesheet">
        <link href="https://goldwinfana.github.io/funnermovies/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://goldwinfana.github.io/funnermovies/lib/animate/animate.min.css" rel="stylesheet">
        <link href="https://goldwinfana.github.io/funnermovies/lib/venobox/venobox.css" rel="stylesheet">

        <!-- Nivo Slider Theme -->
        <link href="https://goldwinfana.github.io/funnermovies/css/nivo-slider-theme.css" rel="stylesheet">
        <!-- serach -->
        <link href="https://goldwinfana.github.io/funnermovies/css/search.css" rel="stylesheet">
        <!-- Main Stylesheet File -->
        <link href="https://goldwinfana.github.io/funnermovies/css/style.css" rel="stylesheet">
        <!-- Responsive Stylesheet File -->
        <link href="https://goldwinfana.github.io/funnermovies/css/responsive.css" rel="stylesheet"





        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
