<x-layout.main>
    <h2 class="margin-bottom-mid">Olá {{ $user }}, aqui estão todos os seus eventos:</h2>
    <div id="event-menu">
        <a href="{{ route('events.create') }}"><button class="no-border rounded-min simple-shadow btn-slim btn-fit">Novo Evento</button></a>
        <input type="search" placeholder="Procurar Evento">
    </div>
    @foreach ($events as $event)
        <x-event-container :event="$event" />
    @endforeach
</x-layout.main>