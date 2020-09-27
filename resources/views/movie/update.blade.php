<x-home>
<div class="mb-8 bg-white rounded-lg border-4 border-red-400 shadow-lg p-6">
        <form method="post" action="/movies/{{$movie->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="flex justify-between mb-2">
                <div class="w-1/4 mr-2">
                    <label for="name" class="text-xl font-bold ml-5 mr-3">Name: </label><br>
                    <input type="string" id="name" name="name" value="{{$movie->name}}"class="border-4 border-gray-600 rounded-lg"><br>
                    <label for="year_of_release" class="text-xl font-bold ml-5 mr-3">Year of release: </label><br>
                    <input type="int" id="year_of_release" name="year_of_release" value="{{$movie->year_of_release}}"class="border-4 border-gray-600 rounded-lg"><br>
                    <label for="picture" class="text-xl font-bold ml-5 mr-3">Change picture: </label><br>
                    <input type="file" name="picture"><br>
                </div>
                <div class="w-1/4 mx-2">
                    <label for="resume" class="text-xl font-bold ml-5 mr-3">Resume: </label><br>
                    <textarea type="text" id="resume" name="resume" rows="4" cols="25" class="border-4 border-gray-600 rounded-lg">{{$movie->resume}}</textarea><br>
                </div>
                <div class="w-1/4 mx-2">
                    <label for="actors" class="text-xl font-bold ml-5 mr-3">Actors: </label><br>
                    <select id="actors" name="actors[]" multiple="multiple" rows="4" class="border-4 border-gray-600 rounded-lg">
                        @foreach($actors as $actor)
                            @if($movie->actors->contains($actor))
                                <option value="{{$actor->id}}" selected>{{$actor->name}}</option>
                            @else
                                <option value="{{$actor->id}}">{{$actor->name}}</option>
                            @endif 
                        @endforeach
                    </select><br>
                </div>
                <div class="w-1/4 ml-2">
                    <label for="tags" class="text-xl font-bold ml-5 mr-3">Tags: </label><br>
                    <select id="tags" name="tags[]" multiple="multiple" rows="4" class="border-4 border-gray-600 rounded-lg">
                        @foreach($tags as $tag) 
                            @if($movie->tags->contains($tag))
                                <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                            @else
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endif 
                        @endforeach
                    </select><br>
                </div>
            </div>
            <div class="flex position-center justify-end">
                <button
                    type="submit"
                    action="/movies/{{$movie->id}}/update"
                    class="bg-gray-500 hover:bg-gray-600 rounded-lg shadow-lg px-10 py-2 text-xl text-white font-bold mx-5 my-3"
                >
                    Update
                </button>
            </div>
        </form>
        @error('name')
            <div class="text-lg text-red-700 mb-4" role="alert"> 
                <strong class="px-3 py-1 bg-red-100 border border-red-400 rounded-lg">
                    {{$message}}
                </strong>
            </div>
        @enderror
        @error('year_of_release')
            <div class="text-lg text-red-700 mb-4" role="alert"> 
                <strong class="px-3 py-1 bg-red-100 border border-red-400 rounded-lg">
                    {{$message}}
                </strong>
            </div>
        @enderror
    </div>
</x-home>