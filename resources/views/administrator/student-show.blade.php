@extends('layouts.content-with-navbar')

@section('title')
    Perfil de {{ $student->name }}
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

    <a class="navbar-item">
        <span class="icon">
            <i class="fas fa-clipboard-list"></i>
        </span>

        <span>
            Relatórios
        </span>
    </a>
@endsection

@section('main-content')
    <div class="box">
        <h2 class="title is-5">{{ $student->name }}</h2>

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
                    @slot('punchInLogShowRoute', 'administrator.punch-in-logs.show')
                @endcomponent
            </main>

            @unless($punchInLogs->isEmpty())
                <footer>
                    <a
                        class="button"
                        href="{{ route('administrator.students.punch-in-logs.index', $student->username) }}"
                    >
                        <span class="icon">
                            <i class="fas fa-list"></i>
                        </span>

                        <span>
                            Visualizar Todos
                        </span>
                    </a>
                </footer>
            @endif
        </section>
    </div>
@endsection
