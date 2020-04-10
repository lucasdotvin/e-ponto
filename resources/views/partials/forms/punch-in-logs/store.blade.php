@extends('partials.forms.punch-in-logs.base')

@section('form-action')
    {{ route('student.punch-in-logs.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection

@section('submit-button')
    <button class="button is-primary" type="submit">
        <span class="icon">
            <i class="fas fa-plus"></i>
        </span>

        <span>
            Registrar
        </span>
    </button>
@endsection
