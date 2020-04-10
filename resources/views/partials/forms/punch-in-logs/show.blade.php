@extends('partials.forms.punch-in-logs.base')

@section('form-fields')
    <fieldset class="field" disabled="disabled">
        @parent
    </fieldset>
@endsection

@section('submit-button')
    @unless ($punchInLog->confirmed_by)
        @if($userRole === 'coordinator')
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
        @endif
    @endif
@endsection
