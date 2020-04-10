@php
    $totalWorkload = $workloadData['totalWorkload'];
    $completeWorkload = $workloadData['completeWorkload'];

    $completeWorkloadPercent = ($completeWorkload / $totalWorkload) * 100;
    $formattedCompleteWorkloadPercent = number_format(
        $completeWorkloadPercent,
        2
    );

    $formattedCompleteWorkload = number_format($completeWorkload, 2);
@endphp

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
                    {{ $formattedCompleteWorkloadPercent }}
                </progress>
            </div>

            <div class="control">
                <span class="tag">
                    {{ $formattedCompleteWorkloadPercent }}%
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

                            <strong>{{ $formattedCompleteWorkload }}h</strong>.
                        </p>
                    </div>
                </details>
            </div>
        </div>
    </main>
</section>
