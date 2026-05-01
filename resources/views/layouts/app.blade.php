<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon site hôtelier')</title>

    <!-- CSS global -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- CSS spécifique à une page -->
    @stack('styles')
</head>
<body>

    <!-- Header -->
    @include('partials.header')

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- JS global -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- JS spécifique à une page -->
    @stack('scripts')

</body>
</html>