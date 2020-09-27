<x-home>
    <div class="flex items-center mb-6">
        <img class="rounded-full border-gray-400 border-lg mr-8"
            src="/images/actors/{{$actor->picture}}"
            width="100"
            height="100"
        >    
        <h1 class="text-4xl text-white font-bold">
                {{$actor->name}}
            </h1>
        </div>
    <p class="text-xl text-white text-justify mb-6">
        {{$actor->biography}}
    </p>
    @forelse($actor->movies as $movie)
        <hr class="my-6">
        @if($movie->is_movie==true)
            <a href="/movies/{{$movie->id}}" class="flex items-center justify-between hover:bg-gray-600">
                <div class="flex items-center">
                    <img class="rounded-full border-gray-400 border-lg mr-5"
                        src="/images/movies/{{$movie->picture}}"
                        width="50"
                        height="50"
                    > 
                    <h1 class="text-2xl text-white font-bold">
                        {{$movie->name}}
                    </h1>
                </div>
                <h3 class="text-xl text-gray-200 font-bold">
                    {{$movie->year_of_release}}
                </h3>
            </a>
        @else
            <a href="/series/{{$movie->id}}" class="flex items-center justify-between hover:bg-gray-600">
                <div class="flex items-center">
                    <img class="rounded-full border-gray-400 border-lg mr-5"
                        src="/images/series/{{$movie->picture}}"
                        width="50"
                        height="50"
                    > 
                    <h1 class="text-2xl text-white font-bold">
                        {{$movie->name}}
                    </h1>
                </div>
                <h3 class="text-xl text-gray-200 font-bold">
                    {{$movie->year_of_release}}
                </h3>
            </a>
        @endif
    @empty
        <hr class="my-6">
        <p class="text-xl text-white">There are no movies yet starring this actor/actress.</p>
    @endforelse
</x-home>