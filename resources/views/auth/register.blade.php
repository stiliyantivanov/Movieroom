<x-app>
    <div class="text-white text-3xl font-bold mb-6">{{ __('Register') }}</div>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <label for="name" class="text-white text-lg font-bold">{{ __('Name') }}</label><br>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus><br>
        @error('name')
            <div class="text-lg text-red-700 my-4" role="alert"> 
                <strong class="px-3 py-1 bg-red-100 border border-red-400 rounded-lg">
                    {{$message}}
                </strong>
            </div>
        @enderror

        <label for="email" class="text-white text-lg font-bold">{{ __('E-Mail Address') }}</label><br>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"><br>
        @error('email')
            <div class="text-lg text-red-700 my-4" role="alert"> 
                <strong class="px-3 py-1 bg-red-100 border border-red-400 rounded-lg">
                    {{$message}}
                </strong>
            </div>
        @enderror

        <label for="password" class="text-white text-lg font-bold">{{ __('Password') }}</label><br>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"><br>

        <label for="password-confirm" class="text-white text-lg font-bold">{{ __('Confirm Password') }}</label><br>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"><br>
        @error('password')
            <div class="text-lg text-red-700 my-4" role="alert"> 
                <strong class="px-3 py-1 bg-red-100 border border-red-400 rounded-lg">
                    {{$message}}
                </strong>
            </div>
        @enderror
        
        <label for="avatar" class="text-white text-lg font-bold">{{ __('Avatar') }}</label><br>
        <input type="file" name="avatar" class="mb-6"><br>

        <button type="submit" class="bg-gray-500 hover:bg-gray-600 rounded-lg shadow-lg px-6 py-1 text-xl text-white font-bold mb-6 mr-5 my-3">
            {{ __('Register') }}
        </button>
    </form>
</x-app>
