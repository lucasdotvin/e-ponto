@extends('partials.forms.departments.base')

@section('form-action')
    {{ route('administrator.departments.update', $department) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection

@section('submit-button')
    <button class="button is-primary" type="submit">
        <span class="icon">
            <i class="fas fa-save"></i>
        </span>

        <span>
            Atualizar
        </span>
    </button>
@endsection
