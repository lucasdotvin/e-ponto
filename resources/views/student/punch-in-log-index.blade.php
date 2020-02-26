@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@section('navbar-start-items')
    <a class="navbar-item is-active" href="{{ route('student.punch-in-logs.index') }}">
        <span class="icon">
            <i class="fas fa-clock"></i>
        </span>

        <span>
            Ponto Eletrônico
        </span>
    </a>
@endsection

@section('main-content')
    <div class="box">
        <a
            class="button is-fullwidth is-primary is-outlined"
            href="{{ route('student.punch-in-logs.create') }}"
        >
            Registrar Novo
        </a>
    </div>

    <section class="box">
        @component('components.punch-in-logs-table')
            @slot('punchInLogs', $punchInLogs)
            @slot('punchInLogShowRoute', 'student.punch-in-logs.show')
        @endcomponent
    </section>
@endsection
