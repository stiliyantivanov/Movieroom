<x-home>
    <div class="mb-8 bg-white rounded-lg border-4 border-red-400 shadow-lg p-6">
        <h1 class="text-3xl text-black font-bold ml-5 mb-6">
            {{$movie->name}}
        </h1>
        <form method="post" action="/reviews/{{$movie->id}}">
            @csrf
            <textarea type="text" id="body" name="body" rows="6" cols="100" class="border-4 border-gray-600 rounded-lg ml-5 mb-6"></textarea><br>
            <button
                type="submit"
                class="bg-gray-500 hover:bg-gray-600 rounded-lg shadow-lg px-10 py-2 text-xl text-white font-bold ml-5"
            >
                Upload review
            </button>
        </form>
    </div>
</x-home>