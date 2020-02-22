@extends('layouts.base')

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
