@extends('layouts.content-with-navbar')

@section('title')
    Perfil de {{ $student->name }}
@endsection

@section('main-content')
    <div class="box">
        <h2 class="title is-5">
            {{ $student->name }}
        </h2>

        @component('components.student-workload-data')
            @slot('totalWorkload', $workloadData['totalWorkload'])
            @slot('completeWorkload', $workloadData['completeWorkload'])
        @endcomponent

        <section class="box">
            <h2 class="title is-5">
                Últimos Registros de Ponto
            </h2>

            <main class="content">
                @component('components.punch-in-logs-table')
                    @slot('punchInLogs', $punchInLogs)
                    @slot('punchInLogShowRoute', 'coordinator.punch-in-logs.show')
                @endcomponent
            </main>

            <footer>
                <a class="button" href="{{ route('coordinator.students.punch-in-logs.index', $student) }}">
                    <span class="icon">
                        <i class="fas fa-list"></i>
                    </span>

                    <span>
                        Visualizar Todos
                    </span>
                </a>
            </footer>
        </section>
    </div>
@endsection
