@component('components.navbar-link')
    @slot('routeName', 'administrator.students.index')
    @slot('linkTitle', 'Estudantes')
    @slot('icon', 'fa-graduation-cap')
@endcomponent

@component('components.navbar-link')
    @slot('routeName', 'administrator.departments.index')
    @slot('linkTitle', 'Departamentos')
    @slot('icon', 'fa-building')
@endcomponent

@component('components.navbar-link')
    @slot('routeName', 'administrator.reports.index')
    @slot('linkTitle', 'Relatórios')
    @slot('icon', 'fa-clipboard-list')
@endcomponent
