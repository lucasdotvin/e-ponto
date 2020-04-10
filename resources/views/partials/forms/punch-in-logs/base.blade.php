<form
    action="@yield('form-action')"
    method="POST"
>
    @csrf
    @yield('form-method')

    @section('form-fields')
        @component('components.form-field')
            @slot('title', 'Dia')
            @slot('name', 'work_day')
            @slot('gotErrors', true)
            @slot('inputProperties', ['required'])
            @slot('type', 'date')

            @isset($punchInLog)
                @slot('model', $punchInLog)
            @endisset
        @endcomponent

        @component('components.form-field')
            @slot('title', 'Horário de Chegada')
            @slot('name', 'work_start_time')
            @slot('gotErrors', true)
            @slot('inputProperties', ['required'])
            @slot('type', 'time')

            @isset($punchInLog)
                @slot('model', $punchInLog)
            @endisset
        @endcomponent

        @component('components.form-field')
            @slot('title', 'Horário de Saída')
            @slot('name', 'work_end_time')
            @slot('gotErrors', true)
            @slot('inputProperties', ['required'])
            @slot('type', 'time')

            @isset($punchInLog)
                @slot('model', $punchInLog)
            @endisset
        @endcomponent
    @show

    <div class="field">
        <div class="control has-text-right">
            @yield('submit-button')
        </div>
    </div>
</form>
