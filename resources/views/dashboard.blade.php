@extends('layouts.app')

@section('title', 'Tableau de bord')
@section('header', 'Tableau de bord')
@section('subheader', 'Vue d\'ensemble de l\'activité des stagiaires')

@section('content')
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-slate-500">Nombre total de stagiaires</p>
            <p class="mt-2 text-3xl font-semibold text-slate-900">{{ $totalStagiaires }}</p>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-slate-500">Stagiaires en cours</p>
            <p class="mt-2 text-3xl font-semibold text-blue-900">{{ $stagiairesEnCours }}</p>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-slate-500">Stages terminés</p>
            <p class="mt-2 text-3xl font-semibold text-slate-900">{{ $stagesTermines }}</p>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-slate-500">Encadrants</p>
            <p class="mt-2 text-3xl font-semibold text-slate-900">{{ $stagiairesParEncadrant->count() }}</p>
        </div>
    </div>

    <div class="mt-8 rounded-lg border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-5 py-4">
            <h2 class="text-lg font-medium text-slate-900">Nombre de stagiaires par encadrant</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Encadrant</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Service</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Nombre de stagiaires</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse ($stagiairesParEncadrant as $encadrant)
                        <tr>
                            <td class="px-5 py-3 text-sm text-slate-900">{{ $encadrant->prenom }} {{ $encadrant->nom }}</td>
                            <td class="px-5 py-3 text-sm text-slate-700">{{ $encadrant->service }}</td>
                            <td class="px-5 py-3 text-sm text-slate-700">
                                <div class="flex items-center gap-3">
                                    <span class="inline-flex min-w-8 justify-center rounded bg-slate-100 px-2 py-0.5 font-medium text-slate-800">{{ $encadrant->stagiaires_count }}</span>
                                    <div class="h-2 w-40 overflow-hidden rounded-full bg-slate-100">
                                        <div class="h-2 rounded-full bg-blue-900" style="width: {{ ($encadrant->stagiaires_count / $maxStagiairesParEncadrant) * 100 }}%"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-5 py-6 text-center text-sm text-slate-500">Aucun encadrant enregistré.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
