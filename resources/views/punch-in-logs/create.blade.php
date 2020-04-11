@extends('layouts.content-with-navbar')

@section('title', 'Registrar Ponto')

@section('main-content')
    <div class="box">
        <h3 class="title is-5">
            Registrar Ponto
        </h3>

        <main>
            @include('partials.forms.punch-in-logs.store')
        </main>
    </div>
@endsection
