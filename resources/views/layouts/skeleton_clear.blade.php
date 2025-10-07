<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel de Administración') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (prefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
</head>

<body class="font-sans antialiased bg-secondary">
    <div class="min-h-screen bg-secondary">
        {{-- @include('layouts._sidebar') --}}

        {{-- <div class="fixed inset-0 z-40 bg-primary bg-opacity-75 lg:hidden hidden" id="sidebar-overlay"></div> --}}

        <!-- Main content -->
        <div class="flex flex-col flex-1 bg-secondary">
            @include('layouts._nav')
            <main class="flex-1 bg-secondary">
                <div class="mt-4">
                    <div class="max-w-screen mx-auto px-2 sm:px-6 md:px-8">
                        @yield('app')
                    </div>
                </div>
            </main>
        </div>
    </div>

    @stack('extra')

    <!-- Scripts principales -->
    <script src="{{ asset('common/js/toast.js') }}"></script>
    <script src="{{ asset('common/js/alertnow.js') }}"></script>
    <script src="{{ asset('common/js/modal-theme.js') }}"></script>
    <script src="{{ asset('common/js/init.js') }}"></script>

    @stack('js')


</body>

</html>
