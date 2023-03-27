<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    {{--  Films          --}}
                    <div id="movies" class="movies-area area-padding bg-gray-400" style="margin-bottom: 25px">
                        <div class="container">

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


            </div>
        </div>
    </div>
</x-app-layout>

