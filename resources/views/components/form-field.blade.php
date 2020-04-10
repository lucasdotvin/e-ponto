@php
    $fieldId = $name . '-field';

    $value = old($name, '');
    if (isset($model)) {
        $value = $model[$name];
    }
@endphp

<div class="field">
    @isset($title)
        <label class="label" for="{{ $fieldId }}">
            {{ $title }}
        </label>
    @endisset

    <div class="control">
        <input
            class="input"
            id="{{ $fieldId }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder ?? '' }}"
            type="{{ $type ?? 'text' }}"
            value="{{ $value }}"

            @foreach($inputProperties as $property)
                {{ $property }}
            @endforeach
        >
    </div>

    @isset($gotErrors)
        @error($name)
            <div class="help has-text-danger">
                {{ $message }}
            </div>
        @enderror
    @endisset
</div>
