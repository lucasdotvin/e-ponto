@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@php
    $userRole = auth()->user()->role->slug;
@endphp

@section('main-content')
    <div class="box">
        <h2 class="title is-5">
            Registro de Ponto

            @if ($punchInLog->confirmed_by)
                <span class="tag is-success">
                    Confirmado
                </span>
            @else
                <span class="tag is-warning">
                    Pendente
                </span>
            @endif
        </h2>

        <main class="content">
            @include('partials.forms.punch-in-logs.show')
        </main>
    </div>
@endsection
