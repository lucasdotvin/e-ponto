@extends('layouts.content-with-navbar')

@section('title', 'Dashboard')

@section('main-content')
    <div class="box">
        <h2 class="title is-5">
            Bolsistas
        </h2>

        <main class="content">
            @if($departmentStudents->isEmpty())
                <div class="has-text-centered">
                    <p class="is-italic">
                        Ainda não há bolsistas cadastrados.
                    </p>
                </div>
            @endif

            @foreach($departmentStudents as $student)
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

                            <small>
                                {{ print('@' . $student->username) }}
                            </small>

                            <br>

                            <a
                                href="{{ route('coordinator.student-profile', $student->username) }}"
                            >
                                Visualizar Dados
                            </a>
                        </div>
                    </main>
                </article>
            @endforeach
        </main>
    </div>
@endsection
