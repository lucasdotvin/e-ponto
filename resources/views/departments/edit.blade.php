@extends('layouts.content-with-navbar')

@section('title')
    Atualizar Departamento
@endsection

@section('main-content')
    <div class="box">
        <h3 class="title is-5">
            Atualizar Departamento
        </h3>

        <main>
            @include('partials.forms.departments.update')
        </main>
    </div>
@endsection
