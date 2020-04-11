@forelse($department->users as $participant)
    @component('components.department-participant-box')
        @slot('participant', $participant)
    @endcomponent
@empty
    @component('components.message')
        @slot('type', 'warning')
        @slot('message', 'Nenhum participante encontrado.')
    @endcomponent
@endforelse
