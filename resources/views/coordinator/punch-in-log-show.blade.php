@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

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

        <footer>
            <div class="level is-mobile">
                <div class="level-left">
                    <a
                        class="button"
                        href="{{ route('coordinator.students.punch-in-logs.index', $punchInLog->user->username) }}"
                    >
                        <span class="icon">
                            <i class="fas fa-arrow-left"></i>
                        </span>

                        <span>
                            Voltar
                        </span>
                    </a>
                </div>

                <div class="level-right">
                    @unless ($punchInLog->confirmed_by)
                        <a
                            class="button is-primary"
                            href="{{ route('coordinator.punch-in-logs.edit', $punchInLog) }}">
                            <span class="icon">
                                <i class="fas fa-clipboard-check"></i>
                            </span>

                            <span>
                                Confirmar
                            </span>
                        </a>
                    @endif
                </div>
            </div>
        </footer>
    </div>
@endsection
