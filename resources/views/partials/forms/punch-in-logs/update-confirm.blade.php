@extends('partials.forms.punch-in-logs.base')

@section('form-action')
    {{ route('coordinator.punch-in-logs.update', $punchInLog) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection

@section('form-fields')
    <fieldset class="field" disabled="disabled">
        @parent
    </fieldset>

    <div class="field">
        <label class="checkbox">
            <input name="coordinator-confirmation" type="checkbox">

            <span>
                Eu confirmo essa declaração de ponto e estou ciente que essa ação é irreversível.
            </span>
        </label>
    </div>

    @error('coordinator-confirmation')
        {{ $message }}
    @enderror
@endsection

@section('submit-button')
    <button class="button is-primary" type="submit">
        <span class="icon">
            <i class="fas fa-clipboard-check"></i>
        </span>

        <span>
            Confirmar
        </span>
    </button>
@endsection
