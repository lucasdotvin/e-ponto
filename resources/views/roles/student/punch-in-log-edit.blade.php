@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@section('navbar-start-items')
    <a class="navbar-item" href="{{ route('punch-in-log.index') }}">
        <span class="icon">
            <i class="fas fa-clock"></i>
        </span>

        <span>
            Ponto Eletrônico
        </span>
    </a>
@endsection

@section('main-content')
    <div class="box">
        <h3 class="title is-5">
            Editar Ponto
        </h3>

        <main>
            <form action="{{ route('punch-in-log.update', $punchInLog) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="field">
                    <label class="label" for="work-day-field">
                        Dia
                    </label>

                    <div class="control">
                        <input class="input" id="work-day-field" name="work-day" type="date" value="{{ $punchInLog->work_day }}">
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
                        <input class="input" id="work-start-time-field" name="work-start-time" type="time" value="{{ $punchInLog->work_start_time }}">
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
                        <input class="input" id="work-end-time-field" name="work-end-time" type="time" value="{{ $punchInLog->work_end_time }}">
                    </div>

                    @error('work-end-time')
                        <div class="help has-text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-fullwidth is-outlined is-primary" type="submit">
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
@endsection

@push('scripts')
    <!-- <Font Awesome> -->
    <script src="{{ asset('assets/js/fontawesome-free-5.11.2-web/js/solid.min.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome-free-5.11.2-web/js/fontawesome.min.js') }}"></script>
    <!-- </Font Awesome> -->
@endpush
