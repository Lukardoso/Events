<x-guest-layout>
    <div class="flex flex-col place-items-center gap-4">
        <h1>Welcome!</h1>
        <p>This is a temporary page.</p>
        <div class="">
            <a href="{{ route('login') }}">
                <x-primary-button>Login</x-primary-button>
            </a>
            <a href="{{ route('register') }}">
                <x-primary-button>Register</x-primary-button>
            </a>
        </div>
    </div>
</x-guest-layout>