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
            @if($reports->isEmpty())
                <div class="has-text-centered">
                    <p class="is-italic">
                        Nenhum relatório encontrado.
                    </p>
                </div>
            @endif

            @foreach($reports as $report)
                <article class="media">
                    <section class="media-left">
                        <span class="icon has-background-grey-lighter is-large">
                            <i class="fas fa-building has-text-grey-light"></i>
                        </span>
                    </section>

                    <main class="media-content">
                        <div class="content">
                            <strong>
                                {{ $report->name }}
                            </strong>

                            <br>

                            <a
                                href="{{ route('administrator.reports.show', $report->uuid) }}"
                            >
                                Visualizar Dados
                            </a>
                        </div>
                    </main>
                </article>
            @endforeach
        </main>
    </div>
@endsection
