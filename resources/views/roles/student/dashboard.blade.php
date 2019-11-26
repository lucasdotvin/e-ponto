@section('navbar-start-items')
    <a class="navbar-item" href="{{ route('punch-in-log') }}">
        <span class="icon">
            <i class="fas fa-clock"></i>
        </span>

        <span>
            Ponto Eletrônico
        </span>
    </a>
@endsection

@section('main-content')
    <div class="box">
        <h2 class="title is-5">
            Cumprimento de Carga Horária
        </h2>

        <main class="content">
            <div class="field is-grouped ep-is-vcentered">
                <div class="control is-expanded">
                    <progress class="progress is-medium is-primary" max="100" value="75">
                        75
                    </progress>
                </div>

                <div class="control">
                    <span class="tag">
                        75%
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <details>
                        <summary class="ep-is-pointer">
                            Mais detalhes
                        </summary>

                        <div class="content">
                            <hr>

                            <p>
                                Carga Horária Total: <strong>100h</strong>.
                            </p>

                            <p>
                                Carga Horária Cumprida: <strong>75h</strong>.
                            </p>
                        </div>
                    </details>
                </div>
            </div>
        </main>
    </div>
@endsection
