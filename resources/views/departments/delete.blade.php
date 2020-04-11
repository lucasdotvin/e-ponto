@extends('layouts.content-with-navbar')

@section('title')
    Deletar {{ $department->name }}
@endsection

@section('main-content')
    <div class="box">
        <h3 class="title is-5">
            Deletar {{ $department->name }}
        </h3>

        <main>
            <form
                action="{{ route('administrator.departments.destroy', $department) }}"
                method="POST"
            >
                @method('DELETE')
                @csrf

                @component('components.message')
                    @slot('type', 'danger')
                    @slot('message')
                        Essa ação não poderá ser desfeita.
                    @endslot
                @endcomponent

                <div class="field">
                    <div class="control has-text-right">
                        <button
                            class="button is-danger"
                            type="submit"
                        >
                            <span class="icon">
                                <i class="fas fa-trash"></i>
                            </span>

                            <span>
                                Remover
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
@endsection
