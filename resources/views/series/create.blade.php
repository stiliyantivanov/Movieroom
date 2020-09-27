<x-home>
    <div class="mb-8 bg-white rounded-lg border-4 border-red-400 shadow-lg p-6">
        <form method="post" action="/movies" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between">
                <div class="w-1/4 mr-2">
                    <label for="name" class="text-xl font-bold ml-5 mr-3">Name: </label><br>
                    <input type="string" id="name" name="name" class="border-4 border-gray-600 rounded-lg"><br>
                    <label for="year_of_release" class="text-xl font-bold ml-5 mr-3">Year of release: </label><br>
                    <input type="int" id="year_of_release" name="year_of_release" class="border-4 border-gray-600 rounded-lg"><br>
                    <label for="year_of_release" class="text-xl font-bold ml-5 mr-3">Picture: </label><br>
                    <input type="file" name="picture"><br>
                </div>
                <div class="w-1/4 mx-2">
                    <label for="resume" class="text-xl font-bold ml-5 mr-3">Resume: </label><br>
                    <textarea type="text" id="resume" name="resume" rows="4" cols="25" class="border-4 border-gray-600 rounded-lg"></textarea><br>
                </div>
                <div class="w-1/4 mx-2 ">
                    <label for="actors" class="text-xl font-bold ml-5 mr-3">Actors: </label><br>
                    <select id="actors" name="actors[]" multiple="multiple" rows="4" class="border-4 border-gray-600 rounded-lg">
                        @foreach($actors as $actor)
                            <option value="{{$actor->id}}">{{$actor->name}}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="w-1/4 ml-2 ">
                    <label for="tags" class="text-xl font-bold ml-5 mr-3">Tags: </label><br>
                    <select id="tags" name="tags[]" multiple="multiple" rows="4" class="border-4 border-gray-600 rounded-lg">
                        @foreach($tags as $tag) 
                            <option value="{{$tag->id}}">{{$tag->name}}</option> 
                        @endforeach
                    </select><br>
                </div>
            </div>
            <div class="flex position-center justify-end">
                <button
                    type="submit"
                    action="/movies"
                    class="bg-gray-500 hover:bg-gray-600 rounded-lg shadow-lg px-10 py-2 text-xl text-white font-bold mx-5 my-3"
                >
                    Add
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