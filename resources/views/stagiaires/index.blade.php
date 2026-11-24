@extends('layouts.app')

@section('title', 'Liste des stagiaires')
@section('header', 'Stagiaires')
@section('subheader', 'Consultez, recherchez et gérez les stagiaires')

@section('content')
    <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <form method="GET" action="{{ route('stagiaires.index') }}" class="grid w-full grid-cols-1 gap-3 sm:grid-cols-4">
            <div>
                <label for="recherche" class="sr-only">Rechercher par nom</label>
                <input type="text" id="recherche" name="recherche" value="{{ $filtres['recherche'] ?? '' }}" placeholder="Rechercher par nom ou prénom"
                    class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700">
            </div>
            <div>
                <label for="statut" class="sr-only">Statut</label>
                <select id="statut" name="statut" class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700">
                    <option value="">Tous les statuts</option>
                    @foreach ($statuts as $statut)
                        <option value="{{ $statut }}" @selected(($filtres['statut'] ?? '') === $statut)>{{ $statut }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="encadrant_id" class="sr-only">Encadrant</label>
                <select id="encadrant_id" name="encadrant_id" class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-slate-700 focus:outline-none focus:ring-1 focus:ring-slate-700">
                    <option value="">Tous les encadrants</option>
                    @foreach ($encadrants as $encadrant)
                        <option value="{{ $encadrant->id }}" @selected(($filtres['encadrant_id'] ?? '') == $encadrant->id)>
                            {{ $encadrant->prenom }} {{ $encadrant->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="inline-flex w-full items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">Filtrer</button>
                <a href="{{ route('stagiaires.index') }}" class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Réinitialiser</a>
            </div>
        </form>
    </div>

    <div class="mb-4 flex justify-end">
        <a href="{{ route('stagiaires.create') }}" class="inline-flex items-center rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800">Ajouter un stagiaire</a>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Stagiaire</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Établissement</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Période</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Encadrant</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Statut</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse ($stagiaires as $stagiaire)
                        <tr>
                            <td class="px-4 py-3 text-sm text-slate-900">
                                <div class="font-medium">{{ $stagiaire->prenom }} {{ $stagiaire->nom }}</div>
                                <div class="text-slate-500">{{ $stagiaire->filiere }}</div>
                            </td>
                            <td class="px-4 py-3 text-sm text-slate-700">{{ $stagiaire->etablissement }}</td>
                            <td class="px-4 py-3 text-sm text-slate-700">{{ $stagiaire->date_debut->format('d/m/Y') }} - {{ $stagiaire->date_fin->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 text-sm text-slate-700">{{ $stagiaire->encadrant?->prenom }} {{ $stagiaire->encadrant?->nom }}</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-medium {{ $stagiaire->classe_badge_statut }}">{{ $stagiaire->statut }}</span>
                            </td>
                            <td class="px-4 py-3 text-right text-sm">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('stagiaires.show', $stagiaire) }}" class="rounded-md border border-slate-300 px-3 py-1.5 text-slate-700 hover:bg-slate-50">Consulter</a>
                                    <a href="{{ route('stagiaires.edit', $stagiaire) }}" class="rounded-md border border-slate-300 px-3 py-1.5 text-slate-700 hover:bg-slate-50">Modifier</a>
                                    <form method="POST" action="{{ route('stagiaires.destroy', $stagiaire) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce stagiaire ? Cette action est irréversible.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md border border-red-200 px-3 py-1.5 text-red-700 hover:bg-red-50">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-sm text-slate-500">Aucun stagiaire trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($stagiaires->hasPages())
            <div class="border-t border-slate-200 px-4 py-3">
                {{ $stagiaires->links() }}
            </div>
        @endif
    </div>
@endsection
