@if($student->punchInLogs->isEmpty())
    @component('components.message')
        @slot('type', 'warning')
        @slot('message', 'Nenhum registro encontrado.')
    @endcomponent
@else
    @php
        $userRole = auth()->user()->role->slug;
    @endphp

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
                @foreach ($student->punchInLogs as $log)
                    @php
                        $punchInLogShowRouteName = $userRole . '.punch-in-logs.show';
                        $punchInLogShowRoute = route(
                            $punchInLogShowRouteName,
                            $log
                        );

                        $formattedWorkDayDate = date(
                            'd\/m\/Y',
                            strtotime($log->work_day)
                        );
                    @endphp

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
                            {{ $formattedWorkDayDate }}
                        </td>

                        <td>
                            <div class="field">
                                <div class="control has-text-centered">
                                    <a
                                        class="button is-small"
                                        href="{{ $punchInLogShowRoute }}"
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
