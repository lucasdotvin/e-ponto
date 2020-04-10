@extends('layouts.content-with-navbar')

@section('title', 'Estudantes')

@section('main-content')
    <div class="box has-background-white-bis is-marginless">
        <form method="GET">
            <fieldset class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input
                                class="input"
                                name="q"
                                placeholder="Pesquisar por nome ou matrícula"
                                type="text"
                                value="{{ request()->input('q', '') }}"
                            >
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="department">
                                    <option disabled selected>
                                        Selecione um departamento
                                    </option>

                                    <option
                                        value="no"
                                        @if (request()->input('department') == 'no')
                                            selected
                                        @endif
                                    >
                                        Sem Departamento
                                    </option>

                                    <option
                                        value="any"
                                        @if (request()->input('department') == 'any')
                                            selected
                                        @endif
                                    >
                                        Qualquer Departamento
                                    </option>

                                    <optgroup label="Departamentos">
                                        @foreach($departments as $department)
                                            <option
                                                value="{{ $department->id }}"
                                                @if(request()->input('department') == $department->id)
                                                    selected
                                                @endif
                                            >
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="button is-fullwidth is-primary">
                                <span class="icon">
                                    <i class="fas fa-search"></i>
                                </span>

                                <span>
                                    Pesquisar
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="box">
        <main class="content">
            @if($students->isEmpty())
                <div class="has-text-centered">
                    <p class="is-italic">
                        Nenhum estudante encontrado.
                    </p>
                </div>
            @endif

            @foreach($students as $student)
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

                            @if($student->department)
                                <span class="tag">
                                    {{ $student->department->name }}
                                </span>
                            @endif

                            <small>
                                {{ '@' . $student->username }}
                            </small>

                            <br>

                            <a
                                href="{{ route('administrator.students.show', $student->username) }}"
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
