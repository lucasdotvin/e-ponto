@extends('layouts.content-with-navbar')

@section('title', 'Ponto')

@section('main-content')
    <div class="box">
        <h2 class="title is-5">
            Editar Ponto
        </h2>

        <main class="content">
            @include('partials.forms.punch-in-logs.update')
        </main>
    </div>
@endsection
