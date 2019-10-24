@extends('layouts.form-page')

@push('css')
<link rel="stylesheet" href="assets/css/form-page/index.css">
@endpush

@section('centered-content')
    <main class="box is-marginless">
        <h4 class="title has-text-centered is-4 ep-bordered-form-title">
            Log In
        </h4>

        <form action="">
            <div class="field">
                <label class="label" for="username-input">
                    Nome de Usuário
                </label>

                <input class="input" id="username-input" name="username" type="number">
            </div>

            <div class="field">
                <label class="label" for="password-input">
                    Senha
                </label>

                <input class="input" id="password-input" name="password" type="password">

                <div class="help">
                    <div class="has-text-right">
                        <a href="">
                            Esqueceu sua senha?
                        </a>
                    </div>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-fullwidth is-primary">
                        Entrar
                    </button>
                </div>
            </div>
        </form>
    </main>

    <footer class="box has-background-white-bis">
        aa
    </footer>
@endsection
 