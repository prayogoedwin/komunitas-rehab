<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Komunitas-Rehab</title>
    @include('publik.includes.style')
    @stack('css')
</head>

<body>
    @include('publik.includes.navbar')
    @yield('content')

    <!-- Footer -->
    @include('publik.includes.footer')

    @include('publik.includes.script')
    @stack('js')
</body>

</html>
