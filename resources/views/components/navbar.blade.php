<nav class="navbar is-fixed-top is-primary ep-has-shadow" data-role="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/logo.min.svg') }}" alt="">
            </a>

            <h1 class="navbar-item is-4 is-marginless title">
                E-Ponto
            </h1>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-role="navbar-burger-button">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu" data-role="navbar-menu">
            <div class="navbar-start">
                @yield('navbar-start-items')
            </div>

            <div class="navbar-end">
                <form action="{{ route('logout') }}" id="logout-form" method="POST">
                    @method('POST')
                    @csrf
                </form>

                <a class="navbar-item" data-form-submition-trigger-event="click" data-role="form-submition-trigger" data-target-form="logout-form">
                    <span class="icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>

                    <span>
                        Sair
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>

@push('scripts')
    <script src="{{ asset('assets/js/form-submition-triggers.js') }}"></script>
    <script src="{{ asset('assets/js/navbar-menu.js') }}"></script>
@endpush
