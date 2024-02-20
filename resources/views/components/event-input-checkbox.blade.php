@props([
    'message', 'label', 'type' => 'text', 'name', 'required' => ''
])

<div>
    <p class="uppercase">{{ $message }}</p>
    <div class="flex flex-wrap place-items-center gap-2 mt-3">
        {{ $slot }}
        <label class="hidden" for="{{ $name }}">{{ $label }}</label>
        <input  
            id="{{ $name }}"          
            type="{{ $type }}"
            name="{{ $name }}"
            {{ $required }}
            value="{{ old($name) }}"
            {{ $attributes->merge(['class' => 'flex-vertical']) }}
        />
    </div>
</div>