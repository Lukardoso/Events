<x-layout.main>
    <div style="place-self: center;">
        <h1>Welcome!</h1>
        <p>This is a temporary page.</p>
        <div style="flex-direction: row;">
            <a href="{{ route('login') }}">
                <button>Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button>Register</button>
            </a>
        </div>
    </div>
</x-layout.main>