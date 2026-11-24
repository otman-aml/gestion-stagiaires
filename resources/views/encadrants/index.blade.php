@extends('layouts.app')

@section('title', 'Liste des encadrants')
@section('header', 'Encadrants')
@section('subheader', 'Consultez et gérez les encadrants de l\'entreprise')

@section('content')
    <div class="mb-4 flex justify-end">
        <a href="{{ route('encadrants.create') }}" class="inline-flex items-center rounded-md bg-blue-900 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800">Ajouter un encadrant</a>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Encadrant</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Service / département</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">E-mail professionnel</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">Stagiaires affectés</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse ($encadrants as $encadrant)
                        <tr>
                            <td class="px-4 py-3 text-sm font-medium text-slate-900">{{ $encadrant->prenom }} {{ $encadrant->nom }}</td>
                            <td class="px-4 py-3 text-sm text-slate-700">{{ $encadrant->service }}</td>
                            <td class="px-4 py-3 text-sm text-slate-700">{{ $encadrant->email }}</td>
                            <td class="px-4 py-3 text-sm text-slate-700">{{ $encadrant->stagiaires_count }}</td>
                            <td class="px-4 py-3 text-right text-sm">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('encadrants.edit', $encadrant) }}" class="rounded-md border border-slate-300 px-3 py-1.5 text-slate-700 hover:bg-slate-50">Modifier</a>
                                    <form method="POST" action="{{ route('encadrants.destroy', $encadrant) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet encadrant ? Cette action est irréversible.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md border border-red-200 px-3 py-1.5 text-red-700 hover:bg-red-50">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-sm text-slate-500">Aucun encadrant enregistré.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($encadrants->hasPages())
            <div class="border-t border-slate-200 px-4 py-3">
                {{ $encadrants->links() }}
            </div>
        @endif
    </div>
@endsection
