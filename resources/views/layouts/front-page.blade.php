<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - {{ $title ?? "Let's write something great!" }}</title>

    {{-- Tailwind CSS --}}
    <link rel="stylesheet" href="{{ asset('public/css/app.css?v=1.0.004') }}">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header class="fixed top-0 right-0 w-screen z-10 xl:hidden">
        <div
            class="flex justify-between items-center p-3 md:px-5 border-b-2 bg-slate-50 border-blue-700 dark:bg-gray-700">
            <div class="flex items-center" id="brand">
                <img class="w-8 mr-2" id="brand-image" src="{{ asset('public/img/logo.svg') }}"
                    alt="{{ config('app.name') }}">
                <p class="font-bold text-blue-700 text-lg leading-tight" id="brand-text">{{ config('app.name') }}</p>
            </div>
            <div id="menu-panel">
                <span class="text-3xl text-blue-700" id="menu-btn"><i class="bi bi-list"></i></sp>
            </div>
        </div>
    </header>
    <main class="mt-20">
        @yield('content')
    </main>
    <footer class="bg-slate-50 border-t-2 border-blue-700 mt-3">
        <div class="flex flex-col py-3">
            <p class="text-center text-sm">{{ $owner['full_name'] }}'s Blog</p>
            <p class="text-center text-sm mb-3">{{ date('Y') }} - All Rights Reserved</p>
            <p class="text-center text-xs text-blue-600">Powered by funtasticBlog - Wacana Belaka</p>
        </div>
    </footer>
</body>

</html>
