@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@section('main-content')
    <div class="box">
        <h3 class="title is-5">
            Confirmar Ponto
        </h3>

        <main>
            @include('partials.forms.punch-in-logs.update-confirm')
        </main>
    </div>
@endsection
