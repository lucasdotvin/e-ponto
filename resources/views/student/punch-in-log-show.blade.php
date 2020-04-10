@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@php
    $userRole = auth()->user()->role->slug;
@endphp

@section('main-content')
    <div class="box">
        <h2 class="title is-5">
            Registro de Ponto

            @if ($punchInLog->confirmed_by)
                <span class="tag is-success">
                    Confirmado
                </span>
            @else
                <span class="tag is-warning">
                    Pendente
                </span>
            @endif
        </h2>

        <main class="content">
            @include('partials.forms.punch-in-logs.show')

            @if($userRole === 'student')
                @unless ($punchInLog->confirmed_by)
                    <div class="field is-grouped is-grouped-right">
                        <div class="control">
                            <div class="field">
                                <div class="control">
                                    <a
                                        class="button is-fullwidth"
                                        href="{{ route('student.punch-in-logs.edit', $punchInLog) }}"
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
                        </div>

                        <div class="contr">
                            <div class="field">
                                <div class="control">
                                    <form method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button
                                            class="button is-fullwidth is-danger is-outlined"
                                            type="submit"
                                        >
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>

                                            <span>
                                                Remover
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </main>
    </div>
@endsection

