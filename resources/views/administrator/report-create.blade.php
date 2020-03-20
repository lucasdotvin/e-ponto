@extends('layouts.content-with-navbar')

@section('title')
    Emitir Relatório
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
        <h3 class="title is-5">
            Emitir Relatório
        </h3>

        <main>
            <form action="{{ route('administrator.reports.store') }}" method="POST">
                @method('POST')
                @csrf

                <div class="field">
                    <label class="label" for="month-field">
                        Nome de Usuário
                    </label>

                    <div class="control">
                        @php
                            $currentMonth = Carbon\Carbon::now();
                            $currentMonth = $currentMonth->format('Y-m');
                        @endphp

                        <input
                            class="input"
                            id="month-field"
                            name="month"
                            type="month"
                            value="{{ old('month', $currentMonth) }}"
                            placeholder="Defina o mês do relatório"
                        >
                    </div>

                    <div class="help">
                        @error('month')
                            <p class="has-text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label">
                        Tipo
                    </label>

                    <div class="control">
                        <label class="radio">
                            <input
                                name="type"
                                type="radio"
                                value="general"

                                @if(old('type') === 'general')
                                    checked
                                @endif
                            >

                            Geral
                        </label>

                        <label class="radio">
                            <input
                                name="type"
                                type="radio"
                                value="student"

                                @if(old('type') === 'student')
                                    checked
                                @endif
                            >

                            Específico de Um Estudante
                        </label>
                    </div>

                    @error('type')
                        <div class="help has-text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <label class="label" for="username-field">
                        Nome de Usuário
                    </label>

                    <div class="control">
                        <input
                            class="input"
                            id="username-field"
                            name="username"
                            placeholder="Insira o nome de usuário do estudante"
                            value="{{ old('username') }}"
                        >
                    </div>

                    <div class="help">
                        @error('username')
                            <p class="has-text-danger">
                                {{ $message }}
                            </p>
                        @enderror

                        <p>
                            Este campo deve ser preenchido apenas ao se emitir relatórios específicos de um estudante.
                        </p>
                    </div>
                </div>

                <div class="level is-mobile">
                    <div class="level-left">
                        <div class="field">
                            <div class="control">
                                <a class="button" href="{{ route('administrator.reports.index') }}">
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
                                        Emitir
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
