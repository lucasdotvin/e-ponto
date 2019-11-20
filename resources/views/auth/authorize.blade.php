@extends('layouts.form-page')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/e-ponto-bulma-theme/css/form-page/index.css') }}">
@endpush

@section('centered-content')
    <main class="box is-marginless">
        <h4 class="title has-text-centered is-4 ep-bordered-form-title">
            Log In
        </h4>

        <div class="content is-hidden" data-role="authorization-message">
            <p>
                Por favor autorize o E-Ponto.
            </p>
        </div>

        <div class="buttons">
            <a class="button is-fullwidth is-loading is-primary" href="{{ env('') }}" data-role="suap-login-button">
                Autorizar
            </a>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        var CLIENT_ID = '{!! env('SUAP_API_CLIENT_ID') !!}';
        var REDIRECT_URI = '{!! env('SUAP_API_REDIRECT_URI') !!}';
        var SUAP_URL = '{!! env('SUAP_URL') !!}';
    </script>

    <!-- <jQuery> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- </jQuery> -->

    <script src="{{ asset('assets/js/suap-api/js.cookie.js') }}"></script>

    <!-- <SUAP API Client> -->
    <script src="{{ asset('assets/js/suap-api/client.js') }}"></script>
    <!-- </SUAP API Client> -->

    <script src="{{ asset('assets/js/suap-api/client-setup.js') }}"></script>
@endpush
