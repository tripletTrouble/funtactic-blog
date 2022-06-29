<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>{{ config('app.name') }} - {{ $title ?? "Let's write something great!" }}</title>
</head>

<style>
</style>

<body>
    <header class="fixed top-0 right-0 w-screen z-10 xl:hidden">
        <div
            class="flex justify-between items-center p-3 md:px-20 border-b-2 border-rose-600 bg-slate-100 dark:bg-gray-700">
            <div class="flex items-center" id="brand">
                @inject('setting', 'App\Services\SettingService')
                <img class="w-8 mr-2" id="brand-image"
                    src="{{ $setting->identities()['site_logo'] ?? asset('img/logo.svg') }}"
                    alt="{{ config('app.name') }}">
                <p class="font-bold text-rose-600 text-lg leading-tight" id="brand-text">
                    {{ $setting->identities()['site_name'] ?? config('app.name') }}
                </p>
            </div>
            <div id="menu-panel">
                <button class="text-3xl text-rose-600" id="menu-btn"><i class="bi bi-list"></i></button>
            </div>
        </div>
    </header>
    <div class="fixed inset-0 z-20 justify-end hidden" id="responsive-menu">
        <div class="flex flex-col gap-3 w-3/4 md:w-5/12 lg:w-1/3 p-10 bg-gradient-to-br via-sky-100 dark:via-black from-slate-50 to-white dark:from-gray-800 dark:to-slate-900 rounded-l-xl"
            id="menu-list" tabindex="0">
            {{ Settings::identities()['site_name'] }}
            <div class="menu-group">
                <a class="group-name pb-2 border-b border-rose-600 w-full text-left" href="{{ url('/dashboard') }}"><i
                        class="bi bi-house-door-fill mr-1.5"></i> Dashboard</a>
            </div>
            <div class="menu-group">
                <p class="group-name"><i class="bi bi-file-earmark-post mr-2"></i> Artikel</p>
                <a class="group-items" href="{{ url('/new-article') }}"><i class="bi bi-plus-lg mr-1.5"></i> Buat
                    artikel</a>
                <a class="group-items" href="{{ url('/articles') }}"><i class="bi bi-card-checklist mr-1.5"></i>
                    Kelola artikel</a>
                <a class="group-items" href="{{ url('/categories') }}"><i class="bi bi-collection mr-1.5"></i>
                    Kelola kategori</a>
            </div>
            <div class="menu-group">
                <p class="group-name"><i class="bi bi-globe2 mr-2"></i> Situs</p>
                <a class="group-items" href="{{ url('/site-settings') }}"><i class="bi bi-card-list mr-1.5"></i>
                    Identitas situs</a>
                <a class="group-items" href="{{ url('/menu-settings') }}"><i class="bi bi-grid mr-1.5"></i> Kelola
                    menu utama</a>
            </div>
            <div class="menu-group">
                <p class="group-name"><i class="bi bi-person-fill mr-2"></i> Akun</p>
                <a class="group-items" href="{{ url('users/' . Auth::user()->uuid) . '/profiles' }}"><i class="bi bi-person-lines-fill mr-1.5"></i>
                    Profile pemilik</a>
                <a class="group-items" href="#"><i class="bi bi-shield-lock-fill mr-1.5"></i> Kredensial
                    pemilik</a>
            </div>
            <div class="menu-group">
                <form action="{{ url('/logout') }}" method="post">
                    @csrf
                    <button class="group-name pb-2 border-b border-rose-600 w-full text-left"><i
                            class="bi bi-box-arrow-right mr-2"></i>
                        Log Out</button>
                </form>
            </div>
        </div>
    </div>
    <main class="mt-20 xl:mt-0 xl:flex xl:h-screen max-w-screen-xl mx-auto pb-5 lg:pb-0">
        <div class="w-1/3 bg-gradient-to-br vvia-sky-200 dark:via-black from-slate-50 via-sky-100 to-white dark:from-gray-800 dark:to-slate-900 rounded-r-xl border-r-4 border-slate-500 dark:border-slate-100 hidden xl:flex flex-col items-center p-10"
            id="large-menu">
            <div class="flex items-center mb-7" id="brand">
                <img class="w-8 mr-2" id="brand-image" src="{{ asset('img/logo.svg') }}"
                    alt="{{ config('app.name') }}">
                <p class="font-bold text-rose-600 text-lg lg:text-xl 2xl:text-2xl leading-tight" id="brand-text">
                    {{ config('app.name') }}</p>
            </div>
            <div class="flex flex-col gap-3 w-10/12">
                <div class="menu-group">
                    <a class="group-name border-b pb-2 border-rose-600" href="{{ url('/dashboard') }}"><i
                            class="bi bi-house-door-fill mr-1.5"></i> Dashboard</a>
                </div>
                <div class="menu-group">
                    <p class="group-name"><i class="bi bi-file-earmark-post mr-2"></i> Artikel</p>
                    <a class="group-items" href="{{ url('/new-article') }}"><i class="bi bi-plus-lg mr-1.5"></i>
                        Buat
                        artikel</a>
                    <a class="group-items" href="{{ url('/articles') }}"><i class="bi bi-card-checklist mr-1.5"></i>
                        Kelola artikel</a>
                    <a class="group-items" href="{{ url('/categories') }}"><i class="bi bi-collection mr-1.5"></i>
                        Kelola kategori</a>
                </div>
                <div class="menu-group">
                    <p class="group-name"><i class="bi bi-globe2 mr-2"></i> Situs</p>
                    <a class="group-items" href="{{ url('/site-settings') }}"><i
                            class="bi bi-card-list mr-1.5"></i>
                        Identitas situs</a>
                    <a class="group-items" href="{{ url('/menu-settings') }}"><i class="bi bi-grid mr-1.5"></i>
                        Kelola
                        menu utama</a>
                </div>
                <div class="menu-group">
                    <p class="group-name"><i class="bi bi-person-fill mr-2"></i> Akun</p>
                    <a class="group-items" href="{{ url('user/profile') }}"><i
                            class="bi bi-person-lines-fill mr-1.5"></i> Profile pemilik</a>
                    <a class="group-items" href="{{ url('user/credential') }}"><i class="bi bi-shield-lock-fill mr-1.5"></i> Kredensial
                        pemilik</a>
                </div>
                <div class="menu-group">
                    <form action="{{ url('/logout') }}" method="post">
                        @csrf
                        <button class="group-name pb-2 border-b border-rose-600 w-full text-left"><i
                                class="bi bi-box-arrow-right mr-2"></i>
                            Log Out</button>
                    </form>
                </div>
            </div>
        </div>
        @yield('content')
    </main>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const menu = document.getElementById('responsive-menu');
        const menuList = document.getElementById('menu-list');

        menuBtn.addEventListener('click', function() {
            menu.classList.replace('hidden', 'flex');
        })

        menu.addEventListener('click', function(event) {
            const menuGroup = document.getElementsByClassName('menu-group')
            console.log(event.target)
            if (event.target != menuList) {
                menu.classList.replace('flex', 'hidden');
            }
        })
    </script>
</body>

</html>
