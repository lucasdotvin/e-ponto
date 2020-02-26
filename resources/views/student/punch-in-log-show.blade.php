@extends('layouts.content-with-navbar')

@section('title', 'Visualizar Registro de Ponto')

@section('navbar-start-items')
    <a class="navbar-item" href="{{ route('student.punch-in-logs.index') }}">
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
        <h3 class="subtitle is-7">
            Registro de Ponto
        </h3>

        <h2 class="title is-5">
            {{ date('d\/m\/Y', strtotime($punchInLog->work_day)) }}

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
            <strong>
                Horário de Chegada
            </strong>

            <p>
                {{ date('H\:i', strtotime($punchInLog->work_start_time)) }}
            </p>

            <strong>
                Horário de Saída
            </strong>

            <p>
                {{ date('H\:i', strtotime($punchInLog->work_end_time)) }}
            </p>
        </main>

        @unless ($punchInLog->confirmed_by)
            <footer>
                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                        <a class="button" href="{{ route('student.punch-in-logs.edit', $punchInLog) }}">
                            Editar
                        </a>
                    </div>

                    <div class="control">
                        <form method="POST">
                            @method('DELETE')
                            @csrf

                            <button class="button is-danger is-outlined" type="submit">
                                Remover
                            </button>
                        </form>
                    </div>
                </div>
            </footer>
        @endif
    </div>
@endsection
