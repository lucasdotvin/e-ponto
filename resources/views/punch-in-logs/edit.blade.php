@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@php
    $userRole = auth()->user()->role->slug;
@endphp

@section('main-content')
    <div class="box">
        <h2 class="title is-5">
            Editar Ponto
        </h2>

        <main class="content">
            @includeWhen(
                ($userRole === 'student'),
                'partials.forms.punch-in-logs.update'
            )

            @includeWhen(
                ($userRole === 'coordinator'),
                'partials.forms.punch-in-logs.update-confirm'
            )
        </main>
    </div>
@endsection
