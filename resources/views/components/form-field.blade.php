@isset ($inputName)
    @php
        $inputId = $inputName.'-input';
    @endphp
@endisset
<div class="field {{ $fieldElementClasses ?? null }}">
    @switch($inputType)
        @case('button')
            <div class="control">
                <button class="button {{ $buttonElementClasses ?? null }}">
                    {{ $buttonText }}
                </button>
            </div>

            @break

        @default
            <label
                class="label {{ $labelElementClasses ?? null }}"
                for="{{ $inputId }}"
            >
                {{ $labelText }}
            </label>

            <div class="control">
                <input
                    class="input {{ $inputElementClasses ?? null }}"
                    id="{{ $inputId }}"
                    name="{{ $inputName }}"
                    type="{{ $inputType }}"
                >
            </div>

            <div class="help">
                {{ $helpContent ?? null }}
            </div>
    @endswitch
</div>
