@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@section('navbar-start-items')
    <a class="navbar-item" href="{{ route('punch-in-log') }}">
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
        <a class="button is-fullwidth is-primary is-outlined" href="">
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
                                <abbr title="Horário de Entrada">
                                    HEN
                                </abbr>
                            </th>

                            <th>
                                <abbr title="Horário de Saída">
                                    HSA
                                </abbr>
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
                                    {{ date('d\/m\/y', strtotime($log->work_day)) }}
                                </td>

                                <td>
                                    {{ date('H\:i', strtotime($log->work_start_time)) }}
                                </td>

                                <td>
                                    {{ date('H\:i', strtotime($log->work_end_time)) }}
                                </td>

                                <td class="has-text-centered">
                                    <div class="field has-addons">
                                        <div class="control">
                                            <a class="button is-small is-text" href="">
                                                <span class="icon">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </a>
                                        </div>

                                        <div class="control">
                                            <a class="button is-small is-text" href="">
                                                <span class="icon">
                                                    <i class="fas fa-pen"></i>
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
