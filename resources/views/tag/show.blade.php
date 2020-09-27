<x-home>
    <h1 class="text-4xl text-white font-bold mb-6">
        {{$tag->name}}
    </h1>
    @forelse($tag->movies as $movie)
        <hr class="my-6">
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
    @empty
        <hr class="my-6">
        <p class="text-xl text-white">There are no movies yet with this tag.</p>
    @endforelse
</x-home>