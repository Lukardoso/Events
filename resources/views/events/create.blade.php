<x-app-layout>    
    <form action="{{ route('events.store') }}" method="post" id="new-event-form" enctype="multipart/form-data"
        class="flex flex-col gap-8 max-w-2xl sm:ml-52 [&>*]:border-b [&>*]:pb-3">
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
            <p class="uppercase">Se desejar, adicione uma descrição.</p>
            <label class="hidden" for="description">Descrição:</label>
            <textarea name="description" id="description" class="rounded w-full" cols="30" rows="10" value="{{ old('description') }}" placeholder="Descrição"></textarea>
            
            <li class="list-none text-red-700">
                {{ $errors->first('description') }}
            </li>
        </div>

        <x-event-input
            message="Por fim, adicione uma foto para representar o seu evento."
            label="Foto:"
            type="file"
            name="event_picture"
        />
        
        <div class="flex gap-2">
            <x-primary-button type="submit">Salvar</x-primary-button>
            <a href="{{ route('events.index') }}"><x-primary-button type="button">Cancelar</x-primary-button></a>
        </div>

    </form>
</x-app-layout>