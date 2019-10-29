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
        @slot('fixed', 'top')
    @endcomponent

    <div class="container">
        @yield('main-content')
        a
    </div>
@endsection
