@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@endsection

@section('main-content')
    <div class="box">
        <a
            class="button is-fullwidth is-primary is-outlined"
            href="{{ route('student.punch-in-logs.create') }}"
        >
            <span class="icon">
                <i class="fas fa-plus"></i>
            </span>

            <span>
                Registrar Novo
            </span>
        </a>
    </div>

    <section class="box">
        @component('components.punch-in-logs-table')
            @slot('punchInLogs', $punchInLogs)
            @slot('punchInLogShowRoute', 'student.punch-in-logs.show')
        @endcomponent
    </section>
@endsection
