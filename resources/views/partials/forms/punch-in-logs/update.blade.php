@extends('partials.forms.punch-in-logs.base')

@section('form-action')
    {{ route('student.punch-in-logs.update', $punchInLog) }}
@endsection

@section('form-method')
    @method('PUT')
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
