<x-layout.main>    
    <header>
        <link rel="stylesheet" href="/css/forms.css">
    </header>

    <form action="{{ route('events.store') }}" method="post" id="new-event-form" enctype="multipart/form-data" class="vertical-form">
        @csrf

        <div>
            <p>Qual será o nome do seu evento?</p>
            <label for="event_name">Nome do Evento:</label>
            <input type="text" name="event_name" required value="{{ old('event_name') }}">
        </div>

        <div>
            <p>Ok, agora qual seria o tipo deste evento? Ex.: aniversário, casamento, reunião, congresso...</p>
            <label for="type">Tipo:</label>
            <input type="text" name="type" required value="{{ old('type') }}">
        </div>

        <div>
            <p>Quando e onde acontecerá?</p>
            <label for="date">Data:</label>
            <input type="date" name="date" required value="{{ old('date') }}">
            <label for="time">Hora:</label>
            <input type="time" name="time" required value="{{ old('time') }}">
            <label for="local">Local:</label>
            <input type="text" name="local" required value="{{ old('local') }}">
        </div>

        <div>
            <p>Por padrão seu evento será criado fechado ao público, mas se quizer torná-lo disponível a todos, basta selecionar a seguir.</p>
            <div id="open_event">
                <label for="open_event">Evento Aberto:</label>
                <input type="checkbox" name="open_event">
            </div>
        </div>

        <div>
            <p>Se desejar, adicione uma descrição.</p>
            <label for="description">Descrição:</label>
            <textarea name="description" cols="30" rows="10" value="{{ old('description') }}"></textarea>
        </div>

        <div>
            <p>Por fim, adicione uma foto para representar o seu evento.</p>
            <label for="event_picture">Foto:</label>
            <input type="file" name="event_picture" value="{{ old('event_picture') }}">
        </div>
        
        <button type="submit">Salvar</button>


    </form>
</x-layout.main>