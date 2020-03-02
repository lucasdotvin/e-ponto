@if($punchInLogs->isEmpty())
    <div class="content has-text-centered">
        <p class="is-italic">
            Não há registros de ponto.
        </p>
    </div>
@else
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
                                    <i class="fas fa-clipboard-check has-text-success"></i>
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
                                        href="{{ route($punchInLogShowRoute, $log) }}"
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
@endif