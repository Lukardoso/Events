@if(str_contains($eventPicture, 'default_picture.png'))
    <img src="{{ '/images/default_picture.png' }}" alt="Imagem do Evento">
@else
    <img src="{{ '/storage/' . $eventPicture }}" alt="Imagem do Evento">
@endif