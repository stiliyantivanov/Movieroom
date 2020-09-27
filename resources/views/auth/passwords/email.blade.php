<x-app>
    <div class="text-white text-3xl font-bold mb-6">{{ __('Reset Password') }}</div> 

    @if (session('status'))
        <div class="text-lg text-green-700 my-4" role="alert"> 
            <strong class="px-3 py-1 bg-green-100 border border-green-400 rounded-lg">
            {{ session('status') }}
            </strong>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label for="email" class="text-white text-lg font-bold">{{ __('E-Mail Address') }}</label><br>
        <input id="email" type="email" class="mb-6 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
        @error('email')
            <div class="text-lg text-red-700 my-4" role="alert"> 
                <strong class="px-3 py-1 bg-red-100 border border-red-400 rounded-lg">
                    {{$message}}
                </strong>
            </div>
        @enderror                        
                                         
        <button type="submit" class="bg-gray-500 hover:bg-gray-600 rounded-lg shadow-lg px-6 py-1 text-xl text-white font-bold mb-6 mr-5 my-3">
            {{ __('Send Password Reset Link') }}
        </button>
    </form>
</x-app>
