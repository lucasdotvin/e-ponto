@extends('layouts.content-with-navbar')

@section('title')
    Registros de Ponto de {{ $student->name }}
@endsection

@section('main-content')
    <section class="box">
        @component('components.punch-in-logs-table')
            @slot('punchInLogs', $punchInLogs)
            @slot('punchInLogShowRoute', 'coordinator.punch-in-logs.show')
        @endcomponent

        <div class="buttons">
            <a class="button" href="{{ route('coordinator.student-profile', $student) }}">
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
