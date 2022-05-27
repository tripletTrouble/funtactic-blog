<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind CSS --}}
    <link rel="stylesheet" href="{{ asset('public/css/app.css?v=1.0.1') }}">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <title>{{ config('app.name') }} - {{ $site_tagline ?? "Let's write something great!" }}</title>
</head>

<style>
    #menu-list {
        animation-name: slide-left;
        animation-duration: 0.5s;
    }

    @keyframes slide-left {
        from {
            opacity: 0;
            transform: translateX(50%)
        }

        to {
            opacity: 1;
            transform: translateX(0)
        }
    }

</style>

<body>
    <header class="fixed top-0 right-0 w-screen z-10">
        <div class="flex justify-between items-center p-3 border-b-2 border-blue-300 bg-slate-100 dark:bg-gray-700">
            <div class="flex items-center" id="brand">
                <img class="w-8 mr-2" id="brand-image" src="{{ asset('public/img/logo.svg') }}"
                    alt="{{ config('app.name') }}">
                <p class="font-bold text-blue-300 text-lg leading-tight" id="brand-text">{{ config('app.name') }}</p>
            </div>
            <div id="menu-panel">
                <button class="text-3xl text-blue-300" id="menu-btn"><i class="bi bi-list"></i></button>
            </div>
        </div>
    </header>
    <div class="fixed inset-0 z-20 bg-gray-500 bg-opacity-60 justify-end hidden" id="responsive-menu">
        <div class="flex flex-col gap-3 w-3/4 p-10 bg-slate-100 dark:bg-gray-700 rounded-l-xl" id="menu-list"
            tabindex="0">
            <div class="menu-group">
                <p class="group-name"><i class="bi bi-file-earmark-post mr-2"></i> Artikel</p>
                <a class="group-items" href="#"><i class="bi bi-plus-lg mr-1.5"></i> Buat
                    artikel</a>
                <a class="group-items" href="#"><i class="bi bi-card-checklist mr-1.5"></i> Kelola artikel</a>
                <a class="group-items" href="#"><i class="bi bi-collection mr-1.5"></i> Kelola kategori</a>
            </div>
            <div class="menu-group">
                <p class="group-name"><i class="bi bi-globe2 mr-2"></i> Situs</p>
                <a class="group-items" href="#"><i class="bi bi-card-list mr-1.5"></i> Identitas situs</a>
                <a class="group-items" href="#"><i class="bi bi-grid mr-1.5"></i> Kelola menu utama</a>
            </div>
            <div class="menu-group">
                <p class="group-name"><i class="bi bi-person-fill mr-2"></i> Akun</p>
                <a class="group-items" href="#"><i class="bi bi-person-lines-fill mr-1.5"></i> Profile pemilik</a>
                <a class="group-items" href="#"><i class="bi bi-shield-lock-fill mr-1.5"></i> Kredensial pemilik</a>
            </div>
            <div class="menu-group">
                <form action="{{ url('/logout') }}" method="post">
                    @csrf
                    <button class="group-name pb-2 border-b border-blue-200 w-full text-left"><i
                            class="bi  bi-box-arrow-right mr-2"></i>
                        Log Out</button>
                </form>
            </div>

        </div>
    </div>
    <main class="mt-20">
        @yield('content')
    </main>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const menu = document.getElementById('responsive-menu');
        const menuList = document.getElementById('menu-list');

        menuBtn.addEventListener('click', function() {
            menu.classList.replace('hidden', 'flex');
        })

        menuBtn.addEventListener('focusout', function(event) {
            const menuList = document.getElementById('menu-list');
            if (event.relatedTarget != menuList) {
                menu.classList.replace('flex', 'hidden');
            }
        })

        menu.addEventListener('click', function(event) {
            const menuGroup = document.getElementsByClassName('menu-group')
            if (event.target == menu) {
                menu.classList.replace('flex', 'hidden');
            }
        })
    </script>
</body>

</html>
