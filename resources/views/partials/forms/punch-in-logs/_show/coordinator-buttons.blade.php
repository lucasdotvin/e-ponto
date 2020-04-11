@php
    $logConfirmationRouteName = 'coordinator.punch-in-logs.edit';
    $logConfirmationRoute = route(
        $logConfirmationRouteName,
        $punchInLog
    );
@endphp

<a
    class="button is-primary"
    href="{{ $logConfirmationRoute }}"
>
    <span class="icon">
        <i class="fas fa-clipboard-check"></i>
    </span>

    <span>
        Confirmar
    </span>
</a>
