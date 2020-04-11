@extends('layouts.content-with-navbar')

@section('title')
    Registros de Ponto de {{ $student->name }}
@endsection

@php
    $userRole = auth()->user()->role->slug;
@endphp

@section('main-content')
    @if($userRole === 'student')
        <div class="box">
            <a
                class="button is-fullwidth is-primary is-outlined"
                href="{{ route('student.punch-in-logs.create') }}"
            >
                <span class="icon">
                    <i class="fas fa-plus"></i>
                </span>

                <span>
                    Registrar Novo
                </span>
            </a>
        </div>
    @endif

    <section class="box">
        <h2 class="title is-5">Registros de Ponto</h2>

        @include('partials.tables.punch-in-logs')
    </section>
@endsection

