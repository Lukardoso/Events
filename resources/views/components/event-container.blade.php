<div class="event-container">
    <img src="{{ $event->event_picture }}" alt="Imagem do Evento">

    <div>
        <h2>{{ $event->event_name }}</h2>
        <p>Data: {{ $event->date }}</p>
        <p>Local: {{ $event->local }}</p>
        <p>Total de Convidados: xx</p>
        <p>Presença Confirmada: xx</p>
        <div>
            <p>Descrição do Evento:</p>
            <p>{{ $event->description }}</p>
        </div>
    </div>
</div>