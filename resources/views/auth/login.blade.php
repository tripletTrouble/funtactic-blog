<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @inject('setting', 'App\Services\SettingService')
    <title>{{ $setting->identities()['site_name'] ?? config('app.name') }} - Login Page</title>

    {{-- Application CSS --}}
    <link rel="stylesheet" href="{{ asset('css/' . 'app.css') }}">

    {{-- Icons Stylesheet --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

</head>

<body>
    <main
        class="w-screen h-screen flex items-center justify-center bg-gradient-to-br from-white to-slate-100 via-sky-100 dark:from-gray-800 dark:to-slate-900 dark:via-white">
        <div class="bg-white border-rose-600 border-2 w-11/12 md:w-1/2 lg:w-2/5 xl:w-1/3 2xl:w-1/4 rounded-xl p-10">
            <img class="w-10 h-10 mb-3 block mx-auto" src="{{ $setting->identities()['site_logo'] ?? asset('img/logo.svg') }}"
                alt="{{ $setting->identities()['site_name'] }}">
            <p class="text-lg text-center font-bold text-rose-600 dark:text-rose-500 mb-7">{{ $setting->identities()['site_name'] ?? config('app.name') }} - Login Page</p>
            <form action="{{ url('login') }}" method="post">
                @csrf
                <div class="form-col">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" name="email" id="email" class="bg-rose-100 rounded-t-lg placeholder:text-rose-400 text-rose-600 focus:outline-none border-b-2 border-rose-600 p-2 text-xs lg:text-sm" placeholder="Your email ...">
                </div>
                <div class="form-col">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="bg-rose-100 rounded-t-lg placeholder:text-rose-400 text-rose-600 focus:outline-none border-b-2 border-rose-600 p-2 text-xs lg:text-sm" placeholder="Your password ...">
                </div>
                <button class="btn-primary w-full mt-5" type="submit"><i class="bi bi-box-arrow-in-right"></i> Login</button>
            </form>
        </div>
    </main>
</body>

</html>
