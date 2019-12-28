@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@section('navbar-start-items')
    <a class="navbar-item is-active" href="{{ route('punch-in-log.index') }}">
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
        >
            Registrar Novo
        </a>
    </div>

    <div class="box">
        <h2 class="title is-5">
            Registros de Ponto
        </h2>

        <main>
            <div class="table-container">
                <table class="table is-bordered is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th class="has-text-centered">
                                <abbr title="Confirmado pelo Coordenador">
                                    CCO
                                </abbr>
                            </th>

                            <th>
                                <abbr title="Data">
                                    DAT
                                </abbr>
                            </th>

                            <th>
                                Ações
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($punchInLogs as $log)
                            <tr>
                                <td class="has-text-centered">
                                    <span class="icon">
                                        @if ($log->confirmed_by)
                                            <i class="fas fa-check has-text-primary"></i>
                                        @else
                                            <i class="fas fa-ban has-text-danger"></i>
                                        @endif
                                    </span>
                                </td>

                                <td>
                                    {{ date('d\/m\/Y', strtotime($log->work_day)) }}
                                </td>

                                <td>
                                    <div class="field">
                                        <div class="control has-text-centered">
                                            <a
                                                class="button is-small"
                                                href="{{ route('punch-in-log-show', $log) }}"
                                                title="Visualizar"
                                            >
                                                <span class="icon">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection

@push('scripts')
    <!-- <Font Awesome> -->
    <script src="{{ asset('assets/js/fontawesome-free-5.11.2-web/js/solid.min.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome-free-5.11.2-web/js/fontawesome.min.js') }}"></script>
    <!-- </Font Awesome> -->
@endpush
