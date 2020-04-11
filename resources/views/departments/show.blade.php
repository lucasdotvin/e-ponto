@extends('layouts.content-with-navbar')

@section('title')
    {{ $department->name }}
@endsection

@section('main-content')
    <div class="box">
        <h2 class="title is-5">{{ $department->name }}</h2>

        <section class="box">
            <h3 class="title is-6">Integrantes</h3>

            @include('partials.lists.department-participants')
        </section>

        @if(auth()->user()->role->slug === 'administrator')
            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <div class="field">
                        <div class="control">
                            <a
                                class="button is-fullwidth"
                                href="{{ route('administrator.departments.edit', $department) }}"
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

                <div class="control">
                    <div class="field">
                        <div class="control">
                            <a
                                class="button is-fullwidth is-danger is-outlined"
                                href="{{ route('administrator.departments.delete', $department) }}"
                            >
                                <span class="icon">
                                    <i class="fas fa-trash"></i>
                                </span>

                                <span>
                                    Remover
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
