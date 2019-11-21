@extends('layouts.base')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/e-ponto-bulma-theme/css/e-ponto-bulma-theme.css') }}">
@endpush

@push('html-element-classes')
    has-background-light is-clipped
@endpush

@section('content')
    <div class="ep-is-fullwindow-container">
        <div>
            @yield('centered-content')
        </div>
    </div>
@endsection
