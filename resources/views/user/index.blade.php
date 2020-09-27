<x-home>
    @if(!$users->isEmpty())    
        <div class="flex items-center justify-center mb-6">
            <h3 class="text-white text-xl font-bold mr-6">
                Order by:
            </h3>
            <a href="{{route('users',['sort'=>'name'])}}" class="bg-gray-500 hover:bg-gray-600 text-white text-xl font-bold px-6 py-1 rounded-l-lg">
                Name
            </a>
            <a href="{{route('users',['sort'=>'reviews'])}}" class="bg-gray-500 hover:bg-gray-600 text-white text-xl font-bold px-6 py-1 rounded-r-lg">
                No. of reviews
            </a>
        </div>    
        @foreach($users as $user)
            <a href="/users/{{$user->id}}">
                <div class="flex items-center justify-between mb-6 p-6 bg-red-400 rounded-lg shadow-lg">
                    <h class="ml-5 text-3xl font-bold text-white mr-12">
                        {{$user->name}}   
                    </h>
                    <p class="text-xl text-gray-600 mx-12">
                        {{$user->reviews()->count()}} reviews
                    </p>
                </div>    
            </a>
        @endforeach
    @else
        <p class="text-xl text-white">There are no registered users yet.</p>
    @endif
</x-home>