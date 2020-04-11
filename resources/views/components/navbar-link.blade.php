@php
    $itemActivationClass = '';
    if (Route::currentRouteName() === $routeName) {
        $itemActivationClass = 'is-active';
    }
@endphp

<a
    class="navbar-item {{ $itemActivationClass }}"
    href="{{ route($routeName) }}"
>
    @component('components.simple-icon')
        @slot('icon', $icon)
    @endcomponent

    <span>
        {{ $linkTitle }}
    </span>
</a>
