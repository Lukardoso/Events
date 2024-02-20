@if(str_contains($eventPicture, 'default_picture.png'))
    <img src="{{ '/images/default_picture.png' }}" alt="Imagem do Evento" {{ $attributes->merge(['class' => 'rounded-sm']) }}>
@else
    <img src="{{ '/storage/' . $eventPicture }}" alt="Imagem do Evento" {{ $attributes->merge(['class' => 'rounded-sm']) }}>
@endif
