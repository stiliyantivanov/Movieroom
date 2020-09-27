<x-app>
    <div class="text-white text-3xl font-bold mb-6">{{ __('Login') }}</div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
                 
        <label for="email" class="text-white text-lg font-bold">{{ __('E-Mail Address') }}</label><br>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
        @error('email')
            <div class="text-lg text-red-700 my-4" role="alert"> 
                <strong class="px-3 py-1 bg-red-100 border border-red-400 rounded-lg">
                    {{$message}}
                </strong>
            </div>
        @enderror

        <label for="password" class="text-white text-lg font-bold">{{ __('Password') }}</label><br>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>
        @error('password')
            <div class="text-lg text-red-700 my-4" role="alert"> 
                <strong class="px-3 py-1 bg-red-100 border border-red-400 rounded-lg">
                    {{$message}}
                </strong>
            </div>
        @enderror

        <input class="form-check-input" type="checkbox" name="remember" id="remember"> {{ old('remember') ? 'checked' : '' }}
        <label class="text-white text-lg font-bold" for="remember">
            {{ __('Remember Me') }}
        </label><br>

        <div class="mb-6">
            <button type="submit" class="bg-gray-500 hover:bg-gray-600 rounded-lg shadow-lg px-6 py-1 text-xl text-white font-bold mr-5 my-3">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
                <a class="rounded-lg bg-red-400 hover:bg-red-600 shadow-lg text-xl text-white font-bold px-6 py-1 mr-5 my-3" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</x-app>
