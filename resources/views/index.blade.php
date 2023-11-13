<x-layout.main>
    @foreach ($events as $event)
        <x-event-container :event="$event" />
    @endforeach
    <a href="{{ route('events.create') }}">
        <button>Novo Evento</button>
    </a>
</x-layout.main>