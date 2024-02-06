<x-app-layout>
    <div class="flex flex-col gap-14">
        <h2 class="margin-bottom-mid">Olá {{ $user }}, aqui estão todos os seus eventos:</h2>
        <div id="event-menu" class="w-full flex flex-wrap gap-2 justify-center">
            <a href="{{ route('events.create') }}"><x-primary-button>novo evento</x-primary-button></a>
            <input type="search" placeholder="Procurar Evento" class="rounded h-9 w-full sm:w-72">
        </div>
        @foreach ($events as $event)
            <x-event-container :event="$event" />
        @endforeach
    </div>
</x-app-layout>