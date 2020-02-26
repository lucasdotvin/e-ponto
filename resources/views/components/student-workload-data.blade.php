<section class="box">
    <h2 class="title is-5">
        Cumprimento de Carga Horária
    </h2>

    <main class="content">
        <div class="field is-grouped ep-is-vcentered">
            <div class="control is-expanded">
                <progress
                    class="progress is-medium is-primary"
                    max="{{ $totalWorkload }}"
                    value="{{ $completeWorkload }}"
                >
                    {{ number_format(($completeWorkload / $totalWorkload) * 100, 2) }}
                </progress>
            </div>

            <div class="control">
                <span class="tag">
                    {{ number_format(($completeWorkload / $totalWorkload) * 100, 2) }}%
                </span>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <details>
                    <summary class="ep-is-pointer">
                        Mais detalhes
                    </summary>

                    <div class="content">
                        <hr>

                        <p>
                            Carga Horária Total:

                            <strong>{{ $totalWorkload }}h</strong>.
                        </p>

                        <p>
                            Carga Horária Cumprida e Confirmada:

                            <strong>{{ number_format($completeWorkload, 2) }}h</strong>.
                        </p>
                    </div>
                </details>
            </div>
        </div>
    </main>
</section>