<x-app-layout>
    <header>
<!--         <link rel="stylesheet" href="/css/event-details.css"> -->
    </header>

    <h1 id="event-tittle" class="text-center text-4xl my-8">{{ $event->event_name }}</h1>

    <div id="menu-bar" class="flex flex-wrap justify-evenly border-b shadow">
        <a href="#" class="border-b-4 hover:border-red-600 border-transparent">Editar Evento</a>
        <a href="#" class="border-b-4 hover:border-red-600 border-transparent">Excluir Evento</a>
        <a href="#" class="border-b-4 hover:border-red-600 border-transparent">Enviar Convite</a>
        <a href="#" class="border-b-4 hover:border-red-600 border-transparent">Desconvidar</a>
        <a href="#" class="border-b-4 hover:border-red-600 border-transparent">Enviar Notificação</a>
    </div>

    <div id="event" class="grid grid-cols-[300px_1fr] gap-2 pt-6">
        <div>
            <div id="event-data" class="grid gap-4">
                <x-event-picture :eventPicture="$event->event_picture" />
                
                <p class="flex justify-between">
                    <span>Data: {{ $event->date }}</span>
                    <span>Horário: {{ $event->time }}</span>
                </p>
                <p>Local: {{ $event->local }}</p>
                <p>
                    <p>Descrição:</p>
                    <p>{{ $event->description }}</p>
                </p>
                <div id="side-bar">
                    <p>Total de Convidados: 99</p>
                    <p>Presença confirmada: 57</p>
                </div>
            </div>
        </div>
        
        <div>
            <div id="participants" class="grid grid-col text-center gap-8">
                <h2>Convidados</h2>      
                <table>
                    <tr class="[&_>*]:p-2">
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Confirmado</th>
                    </tr>
                    <x-invited class="border-b" />
                </table>
            </div>
        </div>
    </div>
</x-app-layout>