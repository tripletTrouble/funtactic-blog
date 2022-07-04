<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Settings::identities()['site_name'] }} - {{ $title }}</title>
    <meta name="description" content="{{ Settings::identities()['site_description'] }}">

    {{-- Tailwind CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="dark:bg-slate-900 overflow-x-hidden">
    <header class="fixed top-0 right-0 w-screen z-10">
        <div
            class="flex justify-between items-center py-3 lg:py-4 px-5 md:px-16 xl:px-24 2xl:px-48 border-b-2 bg-slate-50 border-sky-500 dark:bg-gray-800">
            <div class="flex items-center" id="brand">
                <img class="w-8 mr-2" id="brand-image" src="{{ Settings::identities()['site_logo'] }}"
                    alt="{{ Settings::identities()['site_name'] }}">
                <p class="font-bold text-sky-500 text-lg leading-tight" id="brand-text">
                    {{ Settings::identities()['site_name'] }}</p>
            </div>
            <div class="menu-panel flex flex-col items-center">
                <div class="hidden lg:flex items-center gap-3 xl:gap-5" id="large-menu">
                    <a class="menu-link" href="{{ url('/') }}">Home</a>
                    @foreach (Settings::menus() as $menu)
                        <a class="menu-link" href="{{ $menu->link }}">{{ $menu->name }}</a>
                    @endforeach
                    <a class="menu-link" href="{{ url('articles/categories') }}">Semua Kategori</a>
                    <button class="btn-info py-1 " id="search-btn"><i class="bi bi-search"></i> Search</button>
                    <div class="dropdown flex gap-3 text-xs text-sky-500 dark:text-sky-400" id="theme-selector">
                        <span class="lg-color-button hidden" id="light"><i class="bi bi-brightness-high-fill text-xl"></i>
                            Light</span>
                        <span class="lg-color-button hidden" id="dark"><i class="bi bi-moon-stars-fill text-xl"></i>
                            Dark</span>
                    </div>
                </div>
                <span class="text-xs text-sky-500 lg:hidden flex flex-col text-center cursor-pointer" id="menu-btn"><i
                        class="bi bi-three-dots text-2xl"></i> Menu</span>
            </div>
        </div>
    </header>
    <div class="menu-modal -translate-x-full" id="mobile-menu">
        <div class="vertical-menu-panel">
            <form action="{{ url('articles/search') }}" method="post">
                <div class="search-box mb-8 flex w-full">
                    <input class="form-control w-4/5 border-sky-500 dark:border-sky-400 rounded-r-none" type="search"
                        name="keywords" id="keywords" placeholder="Cari artikel ...">
                    <button class="btn-info w-1/5 rounded-l-none" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
            <a class="menu-link" href="{{ url('/') }}">Home</a>
            @foreach (Settings::menus() as $menu)
                <a class="menu-link" href="{{ $menu->link }}">{{ $menu->name }}</a>
            @endforeach
            <a class="menu-link" href="{{ url('articles/categories') }}">Semua Kategori</a>
            <hr>
            <div class="text-xs text-sky-500 dark:text-sky-400 mt-7 text-center">
                <p class="mb-3">Tema warna:</p>
                <div class="flex gap-3 mx-auto w-fit">
                    <span class="color-button"><i class="bi bi-brightness-high-fill text-xl"></i> Light</span>
                    <span class="color-button"><i class="bi bi-moon-stars-fill text-xl"></i> Dark</span>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 bg-gray-500 bg-opacity-50 z-20 flex items-center justify-center -translate-x-full transition-all"
        id="search-modal">
        <div class="w-1/2 bg-white dark:bg-slate-800 px-5 py-7 rounded-lg">
            <form action="{{ url('articles/search') }}" method="post">
                @csrf
                <div class="flex mx-auto w-3/4">
                    <input class="form-control w-10/12 border py-1 px-3 rounded-r-none" type="search" name="keywords"
                        id="keywords" placeholder="Cari artikel ...">
                    <button class="btn-info w-2/12 rounded-l-none" type="submit"><i class="bi bi-search"></i>
                        Cari</button>
                </div>
            </form>
        </div>
    </div>
    <main class="mt-20 min-h-screen">
        @yield('content')
    </main>
    <footer class="bg-slate-50 dark:bg-gray-800 border-t-2 border-sky-500 mt-10">
        <div class="flex flex-col py-7 lg:py-12">
            <p class="text-center text-xs xl:text-sm dark:text-white xl:mb-2 tracking-wider">Copyright &copy;
                {{ Users::owner()->profile->full_name }}
            </p>
            <p class="text-center text-xs xl:text-sm dark:text-white mb-3">{{ date('Y') }} - All Rights Reserved
            </p>
            <p class="text-center text-xs xl:text-sm text-sky-500">Powered by Funtastic Blog - Wacana Belaka</p>
        </div>
    </footer>

    <script>
        // Script for menu button
        var menuButton = document.getElementById('menu-btn')
        var mobileMenu = document.getElementById('mobile-menu')
        var searchModal = document.getElementById('search-modal')
        var searchButton = document.getElementById('search-btn')

        var openModal = function(modal) {
            modal.classList.remove('-translate-x-full')
        }

        var closeModal = function(modal) {
            modal.classList.add('-translate-x-full')
        }

        menuButton.addEventListener('click', function() {
            openModal(mobileMenu)
        })

        mobileMenu.addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal(mobileMenu)
            }
        })

        searchButton.addEventListener('click', function() {
            openModal(searchModal)
        })

        searchModal.addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal(searchModal)
            }
        })


        //Script for changing color theme

        // Define intial color
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
            document.getElementById('dark').classList.add('active')
        } else {
            document.documentElement.classList.remove('dark')
            document.getElementById('light').classList.add('active')
        }

        var colorButton = document.getElementsByClassName('color-button')
        var themeSelector = document.getElementById('theme-selector')

        colorButton[0].addEventListener('click', function() {
            this.classList.add('active')
            this.nextElementSibling.classList.remove('active')
            localStorage.theme = 'light'
            document.documentElement.classList.remove('dark')
        })

        colorButton[1].addEventListener('click', function() {
            this.classList.add('active')
            this.previousElementSibling.classList.remove('active')
            localStorage.theme = 'dark'
            document.documentElement.classList.add('dark')
        })

        if (document.documentElement.classList.contains('dark')) {
            colorButton[1].classList.add('active')
        } else {
            colorButton[0].classList.add('active')
        }

        themeSelector.addEventListener('click', function() {
            if (document.documentElement.classList.contains('dark')) {
                localStorage.theme = 'light'
                document.documentElement.classList.remove('dark')
                document.getElementById('light').classList.add('active')
                document.getElementById('dark').classList.remove('active')
            } else {
                localStorage.theme = 'dark'
                document.documentElement.classList.add('dark')
                document.getElementById('light').classList.remove('active')
                document.getElementById('dark').classList.add('active')
            }
        })
    </script>
</body>

</html>
