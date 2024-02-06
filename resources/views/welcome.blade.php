<x-layout.main>
    <div class="flex flex-col gap-4 place-content-center place-items-center">
        <h1>Welcome!</h1>
        <p>This is a temporary page.</p>
        <div class="mt-14">
            <a href="{{ route('login') }}">
                <button class="w-28 bg-slate-800 text-white p-2 rounded">Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button class="w-28 bg-slate-800 text-white p-2 rounded">Register</button>
            </a>
        </div>
    </div>
</x-layout.main>