@extends('layouts.content-with-navbar')

@section('title')
    Departamentos
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
        class="navbar-item is-active"
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
        <a
            class="button is-fullwidth is-primary is-outlined"
            href="{{ route('administrator.departments.create') }}"
        >
            <span class="icon">
                <i class="fas fa-plus"></i>
            </span>

            <span>
                Registrar Novo
            </span>
        </a>
    </div>

    <div class="box">
        <main class="content">
            @if($departments->isEmpty())
                <div class="has-text-centered">
                    <p class="is-italic">
                        Nenhum departamento encontrado.
                    </p>
                </div>
            @endif

            @foreach($departments as $department)
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
            @endforeach
        </main>
    </div>
@endsection
