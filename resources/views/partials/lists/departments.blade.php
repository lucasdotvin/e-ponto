@forelse($departments as $department)
    <article class="media">
        <section class="media-left">
            <span class="icon has-background-grey-lighter is-large">
                <i class="fas fa-building has-text-grey-light"></i>
            </span>
        </section>

        <main class="media-content">
            <div class="content">
                <strong>
                    {{ $department->name }}
                </strong>

                <br>

                <a
                    href="{{ route('administrator.departments.show', $department->uuid) }}"
                >
                    Visualizar Dados
                </a>
            </div>
        </main>
    </article>
@empty
    @component('components.message')
        @slot('type', 'warning')
        @slot('message', 'Nenhum departamento foi encontrado.')
    @endcomponent
@endforelse
