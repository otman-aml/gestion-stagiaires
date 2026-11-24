@extends('layouts.guest')

@section('title', 'Connexion du responsable')

@section('content')
    <h2 class="mb-6 text-lg font-medium text-slate-900">Connexion du responsable</h2>

    <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-slate-700">Adresse e-mail</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('email') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-slate-700">Mot de passe</label>
            <input id="password" name="password" type="password" required autocomplete="current-password"
                class="mt-1 block w-full rounded-md border px-3 py-2 shadow-sm focus:outline-none focus:ring-1 @error('password') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-slate-300 focus:border-slate-700 focus:ring-slate-700 @enderror">
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center">
            <input id="remember" name="remember" type="checkbox" class="rounded border-slate-300 text-slate-800 focus:ring-slate-700">
            <label for="remember" class="ml-2 block text-sm text-slate-700">Se souvenir de moi</label>
        </div>

        <div>
            <button type="submit" class="w-full rounded-md bg-slate-900 px-4 py-2.5 text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-700 focus:ring-offset-2">
                Se connecter
            </button>
        </div>
    </form>
@endsection
