<div class="event-container" onclick="openEvent('{{ $event->id }}')">
    @if(str_contains($event->event_picture, 'default_picture.png'))
        <img src="{{ 'images/default_picture.png' }}" alt="Imagem do Evento">
    @else
        <img src="{{ 'storage/' . $event->event_picture }}" alt="Imagem do Evento">
    @endif

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