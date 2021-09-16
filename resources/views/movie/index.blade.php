<x-home>
    @can('create', App\Movie::class)
        <div class="flex items-center justify-end">   
            <a href="/movies/create" class="rounded-lg bg-green-400 hover:bg-green-600 shadow-lg text-xl text-white font-bold mb-6 px-6 py-1">
                Add a new movie
            </a>        
        </div>
    @endcan
    @if(!$movies->isEmpty())
        <div class="flex items-center justify-center mb-6">
            <h3 class="text-white text-xl font-bold mr-6">
                Order by:
            </h3>
            <a href="{{route('movies',['sort'=>'name'])}}" class="bg-gray-500 hover:bg-gray-600 text-white text-xl font-bold px-6 py-1 rounded-l-lg">
                Name
            </a>
            <a href="{{route('movies',['sort'=>'year_of_release'])}}" class="bg-gray-500 hover:bg-gray-600 text-white text-xl font-bold px-6 py-1">
                Year of release
            </a>
            <a href="{{route('movies',['sort'=>'reviews'])}}" class="bg-gray-500 hover:bg-gray-600 text-white text-xl font-bold px-6 py-1 rounded-r-lg">
                No. of reviews
            </a>
        </div>
        @foreach($movies as $movie)
            <div class="mb-6">
                <a href="/movies/{{$movie->id}}">
                    <div class="flex items-center justify-between mb-3 p-6 bg-red-400 rounded-lg shadow-lg">
                        <div class="flex items-center">
                            <h1 class="ml-5 text-3xl font-bold text-white">
                                {{$movie->name}}   
                            </h1>
                            <h3 class="ml-5 text-xl text-gray-600">
                                {{$movie->year_of_release}}
                            </h3>
                        </div>
                        <p class="mr-5 text-xl text-gray-600">
                            {{$movie->reviews()->count()}} reviews
                        </p>
                    </div>  
                </a>
                <div class="flex items-center justify-end">

                    @auth
                        <a href="/reviews/{{$movie->id}}/create" class="rounded-lg bg-blue-400 hover:bg-blue-600 shadow-lg text-xl text-white font-bold mb-6 mr-2 px-6 py-1">
                            Write a review
                        </a> 
                    @endauth  
                    @can('update', $movie) 
                    <a href="/movies/{{$movie->id}}/edit" class="rounded-lg bg-green-400 hover:bg-green-600 shadow-lg text-xl text-white font-bold mb-6 mr-2 px-6 py-1">
                        Update
                    </a>
                    @endcan
                    @can('delete', $movie)
                    <form method="post" action="/movies/{{$movie->id}}/destroy">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-lg bg-red-400 hover:bg-red-600 shadow-lg text-xl text-white font-bold mb-6 px-6 py-1">
                            Delete
                        </button>
                    </form>
                    @endcan
                </div>
            </div>  
        @endforeach
    @else
        <p class="text-xl text-white">There are no movies yet.</p>
    @endif
</x-home>