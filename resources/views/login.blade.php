@extends('layouts.form-page')

@push('css')
<link rel="stylesheet" href="assets/css/form-page/index.css">
@endpush

@section('centered-content')
    <main class="box is-marginless">
        <h4 class="title has-text-centered is-4 ep-bordered-form-title">
            Log In
        </h4>

        <form action="" method="POST">
            @method('POST')
            @component('components.form-field')
                @slot('inputName', 'username')
                @slot('labelText', 'Nome de Usuário')
                @slot('inputType', 'number')
            @endcomponent

            @component('components.form-field')
                @slot('inputName', 'password')
                @slot('labelText', 'Senha')
                @slot('inputType', 'password')

                @slot('helpContent')
                    <div class="has-text-right">
                        <a href="">
                            Esqueceu sua senha?
                        </a>
                    </div>
                @endslot
            @endcomponent

            @component('components.form-field')
                @slot('inputType', 'button')
                @slot('buttonElementClasses', 'is-fullwidth is-primary')
                @slot('buttonText', 'Entrar')
            @endcomponent
        </form>
    </main>

    <footer class="box has-background-white-bis">
        aa
    </footer>
@endsection
 