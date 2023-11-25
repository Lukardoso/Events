<x-layout.main>
    <header>
        <link rel="stylesheet" href="/css/event-details.css">
    </header>

    <h1 id="event-tittle">{{ $event->event_name }}</h1>

    <div id="menu-bar">
        <a href="#">Editar Evento</a>
        <a href="#">Excluir Evento</a>
        <a href="#">Enviar Convite</a>
        <a href="#">Desconvidar</a>
        <a href="#">Enviar Notificação</a>
    </div>

    <div id="event">
        <div>
            <div id="event-data">
                <img src="/storage/{{ $event->event_picture }}"/>
                
                <p class="flex-container">
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
            <div id="participants">
                <h2>Convidados</h2>      
                <table>
                    <tr class="non-interactive">
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Confirmado</th>
                    </tr>
                    <tr>
                        <td>Lucas Cardoso Lannes</td>
                        <td>33999782780</td>
                        <td>lucas@email.com</td>
                        <td>sim</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-layout.main>