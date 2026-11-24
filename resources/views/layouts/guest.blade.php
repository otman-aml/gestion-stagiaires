<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@hasSection('title')@yield('title') - @endif{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <div class="flex min-h-screen items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-semibold text-slate-900">{{ config('app.name') }}</h1>
                <p class="mt-2 text-sm text-slate-600">Espace de gestion des stagiaires</p>
            </div>
            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
