    <div tabindex="0" class="sm:w-2/4 flex flex-wrap gap-4 align-middle self-center bg-color-30 p-1 border rounded-lg shadow-md cursor-pointer hover:opacity-70" onclick="openEvent('{{ $event->id }}')">
    <x-event-picture :eventPicture="$event->event_picture" class="w-full sm:w-fit" />

    <div id="event-description" class="flex flex-col gap-4">
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
