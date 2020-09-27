<x-home>
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
            <img class="rounded-full border-gray-400 border-lg mr-8"
                src="/images/avatars/{{$user->avatar}}"
                width="100"
                height="100"
            >    
            <h1 class="text-4xl text-white font-bold">
                    {{$user->name}}
            </h1>
        </div>
        @can('update', $user)
            <div class="flex items-center">
                <a href="/users/{{$user->id}}/edit" class="rounded-lg bg-green-400 hover:bg-green-600 shadow-lg text-xl text-white font-bold mr-2 px-6 py-3">
                    Edit
                </a>
            </div>
        @endcan
    </div>
    @forelse($user->reviews as $review)
        <hr class="my-6">
        <div>
            @if($review->movie->is_movie)
                <a href="/movies/{{$review->movie->id}}" class="flex items-center mb-4">
                    <img class="rounded-full border-gray-400 border-lg mr-3"
                        src="/images/movies/{{$review->movie->picture}}"
                        width="40"
                        height="40"
                        >  
                    <h1 class="text-white text-3xl font-bold">
                        {{$review->movie->name}}
                    </h1>                
                </a>
            @else
                <a href="/series/{{$review->movie->id}}" class="flex items-center mb-4">
                    <img class="rounded-full border-gray-400 border-lg mr-3"
                        src="/images/series/{{$review->movie->picture}}"
                        width="40"
                        height="40"
                        >  
                    <h1 class="text-white text-3xl font-bold">
                        {{$review->movie->name}}
                    </h1>                
                </a>
            @endif
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
        <p class="text-xl text-white">There are no reviews by this user yet.</p>
    @endforelse
</x-home>