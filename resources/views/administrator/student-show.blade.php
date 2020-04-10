@extends('layouts.content-with-navbar')

@section('title')
    Perfil de {{ $student->name }}
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
                @include('partials.tables.punch-in-logs')
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
