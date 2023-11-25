<x-layout.main>
    <h2>Olá {{ $user }}, aqui estão todos os seus eventos:</h2>
    <div id="event-menu">
        <a href="{{ route('events.create') }}"><button>Novo Evento</button></a>
        <input type="search" placeholder="Procurar Evento">
    </div>
    @foreach ($events as $event)
        <x-event-container :event="$event" />
    @endforeach
</x-layout.main>