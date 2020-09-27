<x-home>
    <div class="mb-8 bg-white rounded-lg border-4 border-red-400 shadow-lg p-6">
        <form method="post" action="/actors/{{$actor->id}}" class="flex items-center mb-4" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
             <div class="flex items-center justify-center">
                <div class="w-1/3 ml-2 mr-6">
                    <label for="name" class="text-xl font-bold ml-5 mr-3">Name: </label><br>
                    <input type="string" id="name" name="name" value="{{$actor->name}}"class="border-4 border-gray-600 rounded-lg"><br>
                    <label for="picture" class="text-xl font-bold ml-5 mr-3">Change picture: </label><br>
                    <input type="file" name="picture"><br>
                </div>
                <div class="w-1/3 mx-6"> 
                    <label for="biography" class="text-xl font-bold ml-5 mr-3">Biography: </label><br>
                    <textarea type="text" id="biography" name="biography" rows="4" cols="25" class="border-4 border-gray-600 rounded-lg">{{$actor->biography}}</textarea>
                </div>
                <div class="w-1/3 ml-6 mr-2">
                    <button
                        type="submit"
                        class="bg-gray-500 hover:bg-gray-600 rounded-lg shadow-lg px-10 py-2 text-xl text-white font-bold ml-5 mr-3"
                    >
                        Update
                    </button>
                </div>
            </div>
        </form>
        @error('name')
            <div class="ml-2 text-lg text-red-700" role="alert"> 
                <strong class="px-3 py-1 bg-red-100 border border-red-400 rounded-lg">
                    {{$message}}
                </strong>
            </div>
        @enderror
    </div>
</x-home>