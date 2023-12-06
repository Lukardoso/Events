<!-- TODO: Refatorar todos os inputs em components com error messages -->

<x-layout.main>    
    <header>
        <link rel="stylesheet" href="/css/new-event.css">
    </header>

    <form action="{{ route('events.store') }}" method="post" id="new-event-form" enctype="multipart/form-data"
        class="flex-column gap-mid">
        @csrf

        <x-event-input
            message="Qual será o nome do seu evento?"
            label="Nome do Evento"
            name="event_name"
        />

        <x-event-input
            message="Ok, agora qual seria o tipo deste evento? Ex.: aniversário, casamento, reunião, congresso..."
            label="Tipo"
            name="type"
        />

        <x-event-input
            message="Quando e onde acontecerá?"
            label="Data"
            type="date"
            name="date"
        />

        <x-event-input
            message=""
            label="Hora"
            type="time"
            name="time"
        />

        <x-event-input
            message=""
            label="Local"
            name="local"
        />

        <x-event-input-checkbox
            message="Por padrão seu evento será criado fechado ao público, mas se quizer torná-lo disponível a todos, basta selecionar a seguir."
            label="Evento Aberto"
            type="checkbox"
            name="open_event"
        >Evento Aberto: </x-event-input-checkbox>

        <div>
            <p>Se desejar, adicione uma descrição.</p>
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="padding-min rounded-min" cols="30" rows="10" value="{{ old('description') }}" placeholder="Descrição"></textarea>
            
            <li class="list-style-none font-min margin-min error-message">
                {{ $errors->first('description') }}
            </li>
        </div>

        <x-event-input
            message="Por fim, adicione uma foto para representar o seu evento."
            label="Foto:"
            type="file"
            name="event_picture"
        />
        
        <div class="flex-horizontal">
            <button type="submit">Salvar</button>
            <a href="{{ route('events.index') }}"><button type="button">Cancelar</button></a>
        </div>

    </form>
</x-layout.main>