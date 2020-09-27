<x-app>
    <div class="text-white text-3xl font-bold mb-6">{{ __('Verify Your Email Address') }}</div>

    @if (session('resent'))
        <div class="text-lg text-green-700 my-4" role="alert"> 
            <strong class="px-3 py-1 bg-green-100 border border-green-400 rounded-lg">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </strong>
        </div>
    @endif

    <div class="text-white text-xl font-bold">
        {{ __('Before proceeding, please check your email for a verification link.') }}
    </div>
    <div class="text-white text-xl font-bold mb-6">
        {{ __('If you did not receive the email') }}
    </div>

    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="bg-gray-500 hover:bg-gray-600 rounded-lg shadow-lg px-6 py-1 text-xl text-white font-bold mb-6 mr-5 my-3">{{ __('click here to request another') }}</button>.
    </form>
</x-app>
