@extends('layouts.content-with-navbar')

@section('title')
    Registrar Novo Departamento
@endsection

@section('main-content')
    <div class="box">
        <h3 class="title is-5">
            Registrar Departamento
        </h3>

        <main>
            @include('partials.forms.departments.store')
        </main>
    </div>
@endsection
