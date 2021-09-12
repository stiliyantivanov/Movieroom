<x-home>
    @can('create', App\Actor::class)
        <div class="flex items-center justify-end">   
            <a href="/actors/create" class="rounded-lg bg-green-400 hover:bg-green-600 shadow-lg text-xl text-white font-bold mb-6 px-6 py-1">
                Add a new actor
            </a>        
        </div>
    @endcan
    @if(!$actors->isEmpty())
        <div class="flex items-center justify-center mb-6">
            <h3 class="text-white text-xl font-bold mr-6">
                Order by:
            </h3>
            <a href="{{route('actors',['sort'=>'name'])}}" class="bg-gray-500 hover:bg-gray-600 text-white text-xl font-bold px-6 py-1 rounded-l-lg">
                Name
            </a>
            <a href="{{route('actors',['sort'=>'movies'])}}" class="bg-gray-500 hover:bg-gray-600 text-white text-xl font-bold px-6 py-1 rounded-r-lg">
                No. of movies/series
            </a>
        </div>
        @foreach($actors as $actor)
            <div class="mb-6">    
                <a href="/actors/{{$actor->id}}">   
                    <div class="flex items-center justify-between mb-3 p-6 bg-red-400 rounded-lg shadow-lg">
                        <h class="ml-5 mr-12 text-3xl font-bold text-white">
                            {{$actor->name}}   
                        </h>
                        <p class="text-xl text-gray-600 mx-12">
                            {{$actor->movies()->count()}} movies/series
                        </p>
                    </div>  
                </a>  
                <div class="flex items-center justify-end">
                    @can('update', $actor)
                        <a href="/actors/{{$actor->id}}/edit" class="rounded-lg bg-green-400 hover:bg-green-600 shadow-lg text-xl text-white font-bold mb-6 mr-2 px-6 py-1">
                            Update
                        </a>
                    @endcan
                    @can('delete', $actor)
                        <form method="post" action="/actors/{{$actor->id}}/destroy">
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
        <p class="text-xl text-white">There are no actors yet.</p>
    @endif
</x-home>