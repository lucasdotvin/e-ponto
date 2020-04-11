@extends('layouts.content-with-navbar')

@section('title', 'Relatórios')

@section('main-content')
    <div class="box">
        <a
            class="button is-fullwidth is-primary is-outlined"
            href="{{ route('administrator.reports.create') }}"
        >
            <span class="icon">
                <i class="fas fa-plus"></i>
            </span>

            <span>
                Registrar Novo
            </span>
        </a>
    </div>

    <div class="box">
        <main class="content">
            @include('partials.lists.reports')
        </main>
    </div>
@endsection
