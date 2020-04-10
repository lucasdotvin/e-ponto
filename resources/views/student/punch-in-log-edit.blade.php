@extends('layouts.content-with-navbar')

@section('title', 'Editar Registro de Ponto')


@section('main-content')
    <div class="box">
        <h3 class="title is-5">
            Editar Ponto
        </h3>

        <main>
            <form action="{{ route('student.punch-in-logs.update', $punchInLog) }}" method="POST">
                @method('PUT')
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
                            value="{{ old('work-day', $punchInLog->work_day) }}"
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
                            value="{{ old('work-start-time', $punchInLog->work_start_time) }}"
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
                            value="{{ old('work-end-time', $punchInLog->work_end_time) }}"
                        >
                    </div>

                    @error('work-end-time')
                        <div class="help has-text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="level">
                    <div class="level-left">
                        <a
                            class="button"
                            href="{{ route('student.punch-in-logs.show', $punchInLog) }}"
                        >
                            <span class="icon">
                                <i class="fas fa-arrow-left"></i>
                            </span>

                            <span>
                                Voltar
                            </span>
                        </a>
                    </div>

                    <div class="level-right">
                        <div class="field">
                            <div class="control">
                                <button
                                    class="button is-primary"
                                    type="submit"
                                >
                                    <span class="icon">
                                        <i class="fas fa-save"></i>
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
