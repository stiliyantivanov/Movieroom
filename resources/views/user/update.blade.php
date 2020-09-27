<x-home>
<div class="mb-8 bg-white rounded-lg border-4 border-red-400 shadow-lg p-6">
            <form method="post" action="/users/{{$user->id}}" class="flex items-center justify-between" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex items-center justify-center">
                    <div class="w-1/3 ml-2 mr-6">
                        <label for="name" class="text-xl font-bold mr-3">Name: </label>
                        <input type="string" id="name" name="name" value="{{$user->name}}" class="border-4 border-gray-600 rounded-lg">
                    </div>
                    <div class="w-1/3 mx-6"> 
                        <label for="avatar" class="text-xl font-bold ml-5 mr-3">Avatar: </label>
                        <input type="file" name="avatar">
                    </div>
                    <div class="w-1/3 ml-6 mr-2">
                        <button
                            type="submit"
                            class="bg-gray-500 hover:bg-gray-600 rounded-lg shadow-lg px-10 py-2 text-xl text-white font-bold ml-5"
                        >
                            Update
                        </button>
                    </div>
                </div>
            </form>
            @error('name')
                <div class="text-lg text-red-700 my-4" role="alert"> 
                    <strong class="px-3 py-1 bg-red-100 border border-red-400 rounded-lg">
                        {{$message}}
                    </strong>
                </div>
            @enderror
        </div>
</x-home>