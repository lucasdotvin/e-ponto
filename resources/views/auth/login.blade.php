@extends('layouts.form-page')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/form-page/index.css') }}">
@endpush

@section('centered-content')
    <main class="box is-marginless">
        <h4 class="title has-text-centered is-4 ep-bordered-form-title">
            Log In
        </h4>

        <div class="content is-hidden" data-role="authorization-message">
            @if(request()->error)
                <p class="has-text-danger">
                    Por favor autorize o E-Ponto.
                </p>
            @else
                <p>
                    Por favor autorize o E-Ponto.
                </p>
            @endif
        </div>

        <div class="buttons">
            <a class="button is-fullwidth is-loading is-primary" data-role="suap-login-button">
                Autorizar
            </a>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        const CLIENT_ID = '{!! config('suap.api_cliend_id') !!}';
        const REDIRECT_URI = '{!! config('suap.api_redirect_uri') !!}';
        const SUAP_URL = '{!! config('suap.url') !!}';
    </script>

    <script>
        const EPONTO_API_AUTHORIZATION_URL = '{!! route('login') !!}';
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
