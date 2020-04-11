@extends('partials.forms.punch-in-logs.base')

@section('form-fields')
    <fieldset class="field" disabled="disabled">
        @parent
    </fieldset>
@endsection

@unless ($punchInLog->confirmed_by)
    @php
        $userRole = auth()->user()->role->slug;
    @endphp

    @section('submit-button')
        @includeWhen(
            ($userRole === 'student'),
            'partials.forms.punch-in-logs._show.student-buttons'
        )

        @includeWhen(
            ($userRole === 'coordinator'),
            'partials.forms.punch-in-logs._show.coordinator-buttons'
        )
    @endsection
@endif
