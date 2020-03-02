@extends('layouts.content-with-navbar')

@section('title')
    Registrar Novo Departamento
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

    <a class="navbar-item">
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
        <h3 class="title is-5">
            Registrar Departamento
        </h3>

        <main>
            <form action="{{ route('administrator.departments.update', $department) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="field">
                    <label class="label" for="name-field">
                        Nome
                    </label>

                    <div class="control">
                        <input
                            class="input"
                            id="name-field"
                            name="name"
                            placeholder="Digite o nome do novo departamento"
                            type="text"
                            value="{{ old('name', $department->name) }}"
                        >
                    </div>

                    @error('name')
                        <div class="help has-text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="level is-mobile">
                    <div class="level-left">
                        <div class="field">
                            <div class="control">
                                <a
                                    class="button"
                                    href="{{ route('administrator.departments.show', $department) }}"
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
                        <div class="field">
                            <div class="control">
                                <button class="button is-primary" type="submit">
                                    <span class="icon">
                                        <i class="fas fa-plus"></i>
                                    </span>

                                    <span>
                                        Salvar
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
@endsection
