<div class="event-container" onclick="openEvent('{{ $event->id }}')">
    <x-event-picture :eventPicture="$event->event_picture" />

    <div id="event-description">
        <h2>{{ $event->event_name }}</h2>
        <div>
            <p>Data: {{ $event->date }}</p>
            <p>Horário: {{ $event->time }}</p>
        </div>
        <p>Local: {{ $event->local }}</p>
        <div id="invited-status">
            <p>Total de Convidados: xx</p>
            <p>Presença Confirmada: xx</p>
        </div>
    </div>
</div>

<script>
    function openEvent(id) {
        window.open(`/events/${id}`, '_self');
    }
</script>