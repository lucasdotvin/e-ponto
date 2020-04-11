<article class="media">
    <section class="media-left">
        <span class="icon has-background-grey-lighter is-large">
            <i class="fas fa-user has-text-grey-light"></i>
        </span>
    </section>

    <main class="media-content">
        <div class="content">
            <strong>
                {{ $participant->name }}
            </strong>

            <span class="tag">
                {{ $participant->role->name }}
            </span>

            <br>

            @if($participant->role->slug === 'student')
                @php
                    $userRole = auth()->user()->role->slug;
                    $studentProfileRouteName = $userRole . '.students.show';
                    $studentProfileRoute = route(
                        $studentProfileRouteName,
                        $participant->username
                    );
                @endphp

                <a
                    href="{{ $studentProfileRoute }}"
                >
                    Visualizar Dados
                </a>
            @endif
        </div>
    </main>
</article>
