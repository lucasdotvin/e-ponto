@forelse($reports as $report)
    <article class="media">
        <section class="media-left">
            <span class="icon has-background-grey-lighter is-large">
                <i class="fas fa-building has-text-grey-light"></i>
            </span>
        </section>

        <main class="media-content">
            <div class="content">
                <strong>
                    {{ $report->name }}
                </strong>

                <br>

                <a
                    href="{{ route('administrator.reports.show', $report->uuid) }}"
                >
                    Visualizar Dados
                </a>
            </div>
        </main>
    </article>
@empty
    @component('components.message')
        @slot('type', 'warning')
        @slot('message', 'Nenhum relatório foi encontrado.')
    @endcomponent
@endforelse
