<section class="box">
    <h2 class="title is-5">
        Últimos Registros de Ponto
    </h2>

    <main class="content">
        @include('partials.tables.punch-in-logs')
    </main>

    @unless($punchInLogs->isEmpty())
        @php
            $punchInLogsIndexRouteName = $userRole . '.students.punch-in-logs.index';

            $punchInLogsIndexRoute = route(
                $punchInLogsIndexRouteName,
                $student->username
            );
        @endphp

        <footer>
            <a
                class="button"
                href="{{ $punchInLogsIndexRoute }}"
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
