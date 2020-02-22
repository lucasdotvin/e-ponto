@extends('layouts.base')

@push('html-element-classes')
    has-background-light
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
    <script src="{{ asset('assets/js/fontawesome/js/solid.min.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome/js/fontawesome.min.js') }}"></script>
    <!-- </Font Awesome> -->
@endpush
