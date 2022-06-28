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
        <div class="bg-gray-100 border-rose-600 border-2 w-11/12 rounded-xl p-10">
            <img class="w-10 h-10 mb-3 block mx-auto" src="{{ $setting->identities()['site_logo'] ?? asset('img/logo.svg') }}"
                alt="{{ $setting->identities()['site_name'] }}">
            <p class="text-lg text-center font-bold text-rose-600 dark:text-rose-500 mb-7">{{ $setting->identities()['site_name'] ?? config('app.name') }} - Login Page</p>
            <form action="{{ url('login') }}" method="post">
                @csrf
                <div class="form-col">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-col">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button class="btn-primary w-full mt-5" type="submit"><i class="bi bi-box-arrow-in-right"></i> Login</button>
            </form>
        </div>
    </main>
</body>

</html>
