@props([
    'message', 'label', 'type' => 'text', 'name', 'required' => ''
])

<div>
    <p>{{ $message }}</p>
    <div class="checkbox-container">
        {{ $slot }}
        <label for="{{ $name }}">{{ $label }}</label>
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