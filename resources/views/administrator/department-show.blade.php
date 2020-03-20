@extends('layouts.content-with-navbar')

@section('title')
    {{ $department->name }}
@endsection

@section('navbar-start-items')
    <a
        class="navbar-item"
        href="{{ route('administrator.students.index') }}"
    >
        <span class="icon">
            <i class="fas fa-graduation-cap"></i>
        </span>

        <span>
            Estudantes
        </span>
    </a>

    <a
        class="navbar-item"
        href="{{ route('administrator.departments.index') }}"
    >
        <span class="icon">
            <i class="fas fa-building"></i>
        </span>

        <span>
            Departamentos
        </span>
    </a>

    <a
        class="navbar-item"
        href="{{ route('administrator.reports.index') }}"
    >
        <span class="icon">
            <i class="fas fa-clipboard-list"></i>
        </span>

        <span>
            Relatórios
        </span>
    </a>
@endsection

@section('main-content')
    <div class="box">
        <h2 class="title is-5">{{ $department->name }}</h2>

        <section class="box">
            <h3 class="title is-6">Integrantes</h3>

            @if($participants->isEmpty())
                <div class="has-text-centered">
                    <p class="is-italic">
                        Nenhum integrante encontrado.
                    </p>
                </div>
            @endif

            @foreach($participants as $participant)
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
                        </div>
                    </main>
                </article>
            @endforeach
        </section>

        <div class="level">
            <div class="level-left">
                <div class="field">
                    <div class="control">
                        <a
                            class="button is-fullwidth"
                            href="{{ route('administrator.departments.index') }}"
                        >
                            <span class="icon">
                                <i class="fas fa-arrow-left"></i>
                            </span>

                            <span>
                                Voltar
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="level-right">
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <a
                                    class="button is-fullwidth"
                                    href="{{ route('administrator.departments.edit', $department) }}"
                                >
                                    <span class="icon">
                                        <i class="fas fa-pen"></i>
                                    </span>

                                    <span>
                                        Editar
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <a
                                    class="button is-fullwidth is-danger is-outlined"
                                    href="{{ route('administrator.departments.delete', $department) }}"
                                >
                                    <span class="icon">
                                        <i class="fas fa-trash"></i>
                                    </span>

                                    <span>
                                        Remover
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
