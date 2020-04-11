<form
    action="@yield('form-action')"
    method="POST"
>
    @csrf
    @yield('form-method')

    @component('components.form-field')
        @slot('title', 'Nome')
        @slot('name', 'name')
        @slot('placeholder', 'Digite o nome do departamento')
        @slot('gotErrors', true)
        @slot('inputProperties', ['required'])

        @isset($department)
            @slot('model', $department)
        @endisset
    @endcomponent

    <div class="field">
        <div class="control has-text-right">
            @yield('submit-button')
        </div>
    </div>
</form>
