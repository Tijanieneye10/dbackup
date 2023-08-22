<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relen-Documentation</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased overflow-x-hidden">
<header class="fixed top-0 z-[100] inset-x-0 bg-white border-b border-slate-700/30 py-4">
    <div class="container mx-auto max-md:px-5 flex justify-between items-center">
        <img class="max-sm:w-34 w-12" src="https://img.freepik.com/free-icon/backup-database_318-9305.jpg" alt="logo">
        @auth
            <a href="{{ route('backups.index') }}" class="inline-block shadow-lg px-4 font-bold cursor-pointer py-2 bg-indigo-700 text-white rounded-lg">Dashboard</a>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="inline-block shadow-lg px-4 font-bold cursor-pointer py-2 bg-indigo-700 text-white rounded-lg">Login</a>
        @endguest
    </div>
</header>
<section class="py-36 bg-white h-screen flex-row" id="heading">
    <div class="container mx-auto max-md:px-5 flex flex-col justify-center items-center gap-2">
        <div class="logo rounded-full w-[10rem] h-[10rem] grid place-content-center relative after:absolute after:inset-0 after:rounded-full after:filter after:blur-xl after:shadow-xl after:dark:bg-white/20 after:bg-green-200/80">
            <img class="transform -translate-y-4 z-50 w-[8rem] object-cover" src="https://img.freepik.com/free-icon/backup-database_318-9305.jpg" alt="logo">
        </div>
        <div class="content flex flex-col items-center gap-4">
            <h1 class="max-sm:text-4xl text-5xl max-sm:text-center drop-shadow-lg bg-clip-text  text-gray-700 font-extrabold">Database Backup Manager</h1>
            <p class="max-sm:text-lg text-xl text-center lg:w-3/4 text-gray-500">
                Backup multiple databases with ease.
            </p>
            <div class="flex justify-start items-center gap-2">
                <a href="{{ route('backups.index') }}" class="inline-block py-2 shadow-lg px-5 bg-indigo-700 text-white rounded-lg font-bold">Get Started</a>
                <a href="/" class="inline-block p-2 shadow-lg dark:bg-white bg-slate-200  text-gray-800 rounded-lg font-bold">v1.0.0</a>
            </div>
        </div>
    </div>
</section>

</body>
</html>
