@extends('layouts.form-page')

@push('css')
<link rel="stylesheet" href="assets/css/form-page/index.css">
@endpush

@section('centered-content')
    <main class="box is-marginless">
        <h4 class="title has-text-centered is-4 ep-bordered-form-title">
            Sign Up
        </h4>

        <form action="" method="POST">
            @method('POST')
            @csrf

            @component('components.form-field')
                @slot('inputName', 'email')
                @slot('labelText', 'Endereço de E-mail')
                @slot('inputType', 'email')
            @endcomponent

            @component('components.form-field')
                @slot('inputName', 'cpf')
                @slot('labelText', 'CPF')
                @slot('inputType', 'text')
            @endcomponent

            @component('components.form-field')
                @slot('inputName', 'username')
                @slot('labelText', 'Número de Matrícula')
                @slot('inputType', 'number')
            @endcomponent

            @component('components.form-field')
                @slot('inputName', 'password')
                @slot('labelText', 'Senha')
                @slot('inputType', 'password')
            @endcomponent

            @component('components.form-field')
                @slot('inputName', 'password_confirmation')
                @slot('labelText', 'Confirmação de Senha')
                @slot('inputType', 'password')
            @endcomponent

            @component('components.form-button')
                @slot('buttonElementClasses', 'is-fullwidth is-primary')
                @slot('buttonContent', 'Cadastrar')
            @endcomponent
        </form>
    </main>

    <footer class="box has-background-white-bis">
        <div class="has-text-centered">
            <a href="login">
                Já possui uma conta?
            </a>
        </div>
    </footer>
@endsection
 