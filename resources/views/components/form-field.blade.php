@php
    $inputId = $inputName.'-input';
@endphp
<div class="field {{ $fieldElementClasses ?? null }}">
    <label
        class="label {{ $labelElementClasses ?? null }}"
        for="{{ $inputId }}"
    >
        {{ $labelText }}
    </label>

    <div class="control">
        <input
            class="input {{ $inputElementClasses ?? null }} @error($inputName) is-danger @enderror"
            id="{{ $inputId }}"
            name="{{ $inputName }}"
            type="{{ $inputType }}"
            value='{{ old($inputName) }}'
        >
    </div>

    <div class="help">
        {{ $helpContent ?? null }}

        @error($inputName)
            <div class="has-text-danger has-text-left">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
