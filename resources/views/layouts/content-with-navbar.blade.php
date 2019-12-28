@extends('layouts.base')

@push('html-element-classes')
    has-background-light
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/e-ponto-bulma-theme/css/e-ponto-bulma-theme.css') }}">
@endpush

@section('content')
    @component('components.navbar')
        @slot('color', 'primary')
        @slot('fixedPosition', 'top')
    @endcomponent

    <div class="container">
        @yield('main-content')
    </div>
@endsection

@push('scripts')
    <!-- <Font Awesome> -->
    <script src="{{ asset('assets/js/fontawesome-free-5.11.2-web/js/solid.min.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome-free-5.11.2-web/js/fontawesome.min.js') }}"></script>
    <!-- </Font Awesome> -->
@endpush
