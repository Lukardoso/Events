@props([
    'message', 'label', 'type' => 'text', 'name', 'required' => ''
])

<div>
    <p>{{ $message }}</p>
    <label for="{{ $name }}">{{ $label }}</label>
    <input
        id="{{ $name }}" 
        type="{{ $type }}" 
        name="{{ $name }}" 
        placeholder="{{ $label }}"
        {{ $required }}
        value="{{ old($name) }}"
        {{ $attributes->merge(['class' => 'padding-min']) }}
    />
    @foreach($errors->get($name) as $error)
        <li>
            {{ $error }}
        </li>
    @endforeach
</div>