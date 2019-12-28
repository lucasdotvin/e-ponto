@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@section('navbar-start-items')
    <a class="navbar-item" href="{{ route('punch-in-log.index') }}">
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
                        <a class="button" href="{{ route('punch-in-log.edit', $punchInLog) }}">
                            Editar
                        </a>
                    </div>

                    <div class="control">
                        <form action="">
                        </form>
                        <a class="button is-danger is-outlined" href="">
                            Remover
                        </a>
                    </div>
                </div>
            </footer>
        @endif
    </div>
@endsection

@push('scripts')
    <!-- <Font Awesome> -->
    <script src="{{ asset('assets/js/fontawesome-free-5.11.2-web/js/solid.min.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome-free-5.11.2-web/js/fontawesome.min.js') }}"></script>
    <!-- </Font Awesome> -->
@endpush
