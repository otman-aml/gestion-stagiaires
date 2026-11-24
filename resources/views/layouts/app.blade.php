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
    <div class="min-h-screen">
        <nav class="border-b border-slate-200 bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center gap-8">
                        <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-slate-800">
                            {{ config('app.name') }}
                        </a>
                        <div class="hidden items-center gap-1 sm:flex">
                            <a href="{{ route('dashboard') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Tableau de bord</a>
                            <a href="{{ route('stagiaires.index') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('stagiaires.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Stagiaires</a>
                            <a href="{{ route('encadrants.index') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('encadrants.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Encadrants</a>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="hidden text-sm text-slate-600 sm:inline">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-md border border-slate-300 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Déconnexion</button>
                        </form>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1 border-t border-slate-200 py-2 sm:hidden">
                    <a href="{{ route('dashboard') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Tableau de bord</a>
                    <a href="{{ route('stagiaires.index') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('stagiaires.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Stagiaires</a>
                    <a href="{{ route('encadrants.index') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('encadrants.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Encadrants</a>
                </div>
            </div>
        </nav>

        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @include('components.flash')

            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">@yield('header')</h1>
                @hasSection('subheader')
                    <p class="mt-1 text-sm text-slate-600">@yield('subheader')</p>
                @endif
            </div>

            @yield('content')
        </main>
    </div>
</body>
</html>
