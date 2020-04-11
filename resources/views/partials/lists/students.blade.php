@php
    $userRole = auth()->user()->role->slug;
    $studentShowRouteName = $userRole . '.students.show';
@endphp

@forelse($students as $student)
    <article class="media">
        <section class="media-left">
            <span class="icon has-background-grey-lighter is-large">
                <i class="fas fa-user has-text-grey-light"></i>
            </span>
        </section>

        <main class="media-content">
            <div class="content">
                <strong>
                    {{ $student->name }}
                </strong>

                @if($userRole === 'administrator')
                    @if($student->department)
                        <span class="tag">
                            {{ $student->department->name }}
                        </span>
                    @endif
                @endif

                <small>
                    {{ '@' . $student->username }}
                </small>

                <br>

                @php
                    $studentShowRoute = route(
                        $studentShowRouteName,
                        $student->username
                    );
                @endphp

                <a
                    href="{{ $studentShowRoute }}"
                >
                    Visualizar Dados
                </a>
            </div>
        </main>
    </article>
@empty
    @component('components.message')
        @slot('type', 'warning')
        @slot('message', 'Nenhum discente foi encontrado.')
    @endcomponent
@endforelse
