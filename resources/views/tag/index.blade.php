<x-home>
    @can('create')
        <div class="mb-8 bg-white rounded-lg border-4 border-red-400 shadow-lg p-6">
            <form method="post" action="/tags">
                @csrf
                <label for="name" class="text-xl font-bold ml-5">New tag: </label>
                <input type="string" id="name" name="name" class="border-4 border-gray-600 rounded-lg">
                <button
                    type="submit"
                    class="bg-gray-500 hover:bg-gray-600 rounded-lg shadow-lg px-10 py-2 text-xl text-white font-bold ml-5"
                >
                    Add
                </button>
            </form>
        </div>
    @endcan
    @if(!$tags->isEmpty())
        <div class="flex items-center justify-center mb-6">
            <h3 class="text-white text-xl font-bold mr-6">
                Order by:
            </h3>
            <a href="{{route('tags',['sort'=>'name'])}}" class="bg-gray-500 hover:bg-gray-600 text-white text-xl font-bold px-6 py-1 rounded-l-lg">
                Name
            </a>
            <a href="{{route('tags',['sort'=>'movies'])}}" class="bg-gray-500 hover:bg-gray-600 text-white text-xl font-bold px-6 py-1 rounded-r-lg">
                No. of movies/series
            </a>
        </div>
        @foreach($tags as $tag)
            <div class="mb-6">    
                <a href="/tags/{{$tag->id}}">   
                    <div class="flex items-center justify-between mb-3 p-6 bg-red-400 rounded-lg shadow-lg">
                        <h class="ml-5 mr-12 text-3xl font-bold text-white">
                            {{$tag->name}}   
                        </h>
                        <p class="text-xl text-gray-600 mx-12">
                            {{$tag->movies()->count()}} movies/series
                        </p>
                    </div>  
                </a>  
                <div class="flex items-center justify-end">
                @can('delete', $tag)
                    <form method="post" action="/tags/{{$tag->id}}/destroy">
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
        <p class="text-xl text-white">There are no tags yet.</p>
    @endif
</x-home>