@props([
    'message', 'label', 'type' => 'text', 'name', 'required' => '',
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

        @if($errors->get($name))
            error
            onChange="removeError(this)"
        @endif

        {{ $attributes->merge(['class' => 'padding-min']) }}
    />
        <li class="list-style-none font-min margin-min error-message">
            {{ $errors->first($name) }}
        </li>
</div>

<script>
    function removeError(element) {
        element.removeAttribute("error");
    }
</script>