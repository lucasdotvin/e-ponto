@extends('layouts.content-with-navbar')

@section('title')
    Ficha de {{ $student->name }}
@endsection

@php
    $userRole = auth()->user()->role->slug;
@endphp

@section('main-content')
    <div class="box">
        <h2 class="title is-5">{{ $student->name }}</h2>

        @if($userRole === 'administrator')
            @if($student->department)
                <div class="tags has-addons">
                    <span class="tag">
                        Departamento
                    </span>

                    <span class="tag is-primary">
                        {{ $student->department->name }}
                    </span>
                </div>
            @endif
        @endif

        @include('partials.boxes.workload-data')

        @includeUnless(($userRole === 'student'), 'partials.boxes.last-punch-in-logs')
    </div>
@endsection
