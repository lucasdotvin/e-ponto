@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@section('main-content')
    <div class="box">
        <h3 class="title is-5">
            Confirmar Ponto
        </h3>

        <main>
            <form action="{{ route('coordinator.punch-in-logs.update', $punchInLog) }}" method="POST">
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
                            value="{{ $punchInLog->work_day }}"
                            readonly
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
                            value="{{ $punchInLog->work_start_time }}"
                            readonly
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
                            value="{{ $punchInLog->work_end_time }}"
                            readonly
                        >
                    </div>

                    @error('work-end-time')
                        <div class="help has-text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <label class="checkbox">
                        <input name="coordinator-confirmation" type="checkbox">

                        <span>
                            Eu confirmo essa declaração de ponto e estou ciente que essa ação é irreversível.
                        </span>
                    </label>
                </div>

                <div class="field">
                    <div class="level is-mobile">
                        <div class="level-left">
                            <div class="control">
                                <a class="button" href="{{ route('coordinator.punch-in-logs.show', $punchInLog) }}">
                                    <span class="icon">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>

                                    <span>
                                        Voltar
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="level-right">
                            <div class="control">
                                <button class="button is-primary" type="submit">
                                    Confirmar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
@endsection
