@extends('layouts.content-with-navbar')

@section('title', 'Registrar Ponto')

@section('main-content')
    <div class="box">
        <h3 class="title is-5">
            Registrar Ponto
        </h3>

        <main>
            <form action="{{ route('student.punch-in-logs.store') }}" method="POST">
                @method('POST')
                @csrf

                <div class="field">
                    <label class="label" for="work-day-field">
                        Dia
                    </label>

                    <div class="control">
                        <input
                            class="input"
                            id="work-day-field"
                            name="work-day"
                            type="date"
                            value="{{ old('work-day', date('Y\-m\-d')) }}"
                        >
                    </div>

                    @error('work-day')
                        <div class="help has-text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <label class="label" for="work-start-time-field">
                        Horário de Chegada
                    </label>

                    <div class="control">
                        <input
                            class="input"
                            id="work-start-time-field"
                            name="work-start-time"
                            type="time"
                            value="{{ old('work-start-time') }}"
                        >
                    </div>

                    @error('work-start-time')
                        <div class="help has-text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <label class="label" for="work-end-time-field">
                        Horário de Saída
                    </label>

                    <div class="control">
                        <input
                            class="input"
                            id="work-end-time-field"
                            name="work-end-time"
                            type="time"
                            value="{{ old('work-end-time') }}"
                        >
                    </div>

                    @error('work-end-time')
                        <div class="help has-text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="level is-mobile">
                    <div class="level-left">
                        <div class="field">
                            <div class="control">
                                <a class="button" href="{{ route('student.punch-in-logs.index') }}">
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
                                        Registrar
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
