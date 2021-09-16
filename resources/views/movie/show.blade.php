<x-home>
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
            <img class="rounded-full border-gray-400 border-lg mr-8"
                src="/images/movies/{{$movie->picture}}"
                width="100"
                height="100"
            >    
            <h1 class="text-4xl text-white font-bold mr-5">
                {{$movie->name}}
            </h1>
        </div>
        <h3 class="text-4xl text-white">
            {{$movie->year_of_release}}
        </h3>
        </div>
    <p class="text-xl text-white text-justify mb-6">
        {{$movie->resume}}
    </p>
    <div class="flex items-center mb-6">
        <h3 class="text-xl text-white mr-6">
            Starring:
        </h3>
        @forelse($movie->actors as $actor)
            <a href="/actors/{{$actor->id}}" class="text-xl text-white hover:font-bold mr-6">
                {{$actor->name}}
            </a>
        @empty
            <h3 class="text-xl text-white mr-6">
                No information
            </h3>
        @endforelse
    </div>
    <div class="flex items-center mb-6">
        <h3 class="text-xl text-white mr-6">
            Tags:
        </h3>
        @forelse($movie->tags as $tag)
            <a href="/tags/{{$tag->id}}" class="text-xl text-white hover:font-bold mr-6">
                {{$tag->name}}
            </a>
        @empty
            <h3 class="text-xl text-white mr-6">
                No tags available
            </h3>
        @endforelse
    </div>
    <div class="flex items-center justify-end">
        @auth
            <a href="/reviews/{{$movie->id}}/create" class="rounded-lg bg-blue-400 hover:bg-blue-600 shadow-lg text-xl text-white font-bold mb-6 mr-2 px-6 py-1">
                Write a review
            </a> 
        @endauth 
    </div>
    @forelse($movie->reviews as $review)
        <hr class="my-6">
        <div>
            <div class="flex items-center justify-between mb-4">
                <a href="/users/{{$review->user->id}}" class="flex items-center">
                    <img class="rounded-full border-gray-400 border-lg mr-3"
                        src="/images/avatars/{{$review->user->avatar}}"
                        width="40"
                        height="40"
                        >  
                    <h1 class="text-white text-3xl font-bold">
                        {{$review->user->name}}
                    </h1>                
                </a>
            </div>
            <p class="text-white text-xl mb-6">
                {{$review->body}}
            </p>
            <div class="flex items-center justify-end">
                @can('update', $review)
                    <a href="/reviews/{{$review->id}}/edit" class="rounded-lg bg-green-400 hover:bg-green-600 shadow-lg text-xl text-white font-bold mb-6 mr-2 px-6 py-1">
                        Update review
                    </a>
                @endcan
                @can('delete', $review)
                    <form method="post" action="/reviews/{{$review->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-lg bg-red-400 hover:bg-red-600 shadow-lg text-xl text-white font-bold mb-6 px-6 py-1">
                            Delete review
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    @empty
        <hr class="my-6">
        <p class="text-xl text-white">There are no reviews for this movie yet.</p>
    @endforelse
</x-home>