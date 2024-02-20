@props([
    'message', 'label', 'type' => 'text', 'name', 'required' => '',
])

<div>
    <p class="uppercase">{{ $message }}</p>
    <label for="{{ $name }}" class="hidden">{{ $label }}</label>
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

        {{ $attributes->merge(['class' => 'rounded w-full sm:max-w-xs']) }}
    />
        <li class="list-none text-red-700">
            {{ $errors->first($name) }}
        </li>
</div>

<script>
    function removeError(element) {
        element.removeAttribute("error");
    }
</script>