<!DOCTYPE html>
<html class=" @stack('html-element-classes') " lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        @hasSection('title')
            @yield('title') | {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    @stack('css')
</head>

<body class=" @stack('body-element-classes') ">
    @yield('content')

    @stack('scripts')
</body>

</html>