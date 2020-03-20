@extends('layouts.content-with-navbar')

@section('title')
    Registros de Ponto de {{ $student->name }}
@endsection

@section('navbar-start-items')
    <a
        class="navbar-item"
        href="{{ route('administrator.students.index') }}"
    >
        <span class="icon">
            <i class="fas fa-graduation-cap"></i>
        </span>

        <span>
            Estudantes
        </span>
    </a>

    <a
        class="navbar-item"
        href="{{ route('administrator.departments.index') }}"
    >
        <span class="icon">
            <i class="fas fa-building"></i>
        </span>

        <span>
            Departamentos
        </span>
    </a>

    <a
        class="navbar-item"
        href="{{ route('administrator.reports.index') }}"
    >
        <span class="icon">
            <i class="fas fa-clipboard-list"></i>
        </span>

        <span>
            Relatórios
        </span>
    </a>
@endsection

@section('main-content')
    <section class="box">
        @component('components.punch-in-logs-table')
            @slot('punchInLogs', $punchInLogs)
            @slot('punchInLogShowRoute', 'administrator.punch-in-logs.show')
        @endcomponent

        <div class="buttons">
            <a
                class="button"
                href="{{ route('administrator.students.show', $student->username) }}"
            >
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>

                <span>
                    Voltar ao Perfil
                </span>
            </a>
        </div>
    </section>
@endsection
