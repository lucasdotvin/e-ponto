@extends('layouts.content-with-navbar')

@section('title')
    Registros de Ponto de {{ $student->name }}
@endsection

@section('main-content')
    <section class="box">
        <h2 class="title is-5">Registros de Ponto</h2>

        @include('partials.tables.punch-in-logs')
    </section>
@endsection
