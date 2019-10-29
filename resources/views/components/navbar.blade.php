@isset($fixedPosition)
    @php
        $navbarElementFixedPositionClass = 'is-fixed-'.$fixedPosition;
        $htmlElementFixedNavbarPositionClass = 'has-navbar-fixed-'.$fixedPosition;
    @endphp

    @push('html-element-classes')
        {{ $htmlElementFixedNavbarPositionClass }}
    @endpush

    @push('navbar-element-classes')
        {{ $navbarElementFixedPositionClass }}
    @endpush
@endisset

@php
    $navbarElementColorClass = 'is-'.$color;
@endphp

<nav
    class="navbar {{ $navbarElementColorClass }} @stack('navbar-element-classes')"
>
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/logo.min.svg') }}" alt="">
            </a>

            <h1 class="navbar-item is-4 title">
                Dashboard
            </h1>
        </div>
    </div>
</nav>
