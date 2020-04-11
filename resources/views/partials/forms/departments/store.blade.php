@extends('partials.forms.departments.base')

@section('form-action')
    {{ route('administrator.departments.store') }}
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
