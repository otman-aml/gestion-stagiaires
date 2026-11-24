@extends('layouts.app')

@section('title', 'Fiche stagiaire')
@section('header', 'Fiche stagiaire')
@section('subheader', $stagiaire->prenom . ' ' . $stagiaire->nom)

@section('content')
    <div class="mb-4 flex flex-wrap gap-2">
        <a href="{{ route('stagiaires.edit', $stagiaire) }}" class="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">Modifier</a>
        <a href="{{ route('stagiaires.index') }}" class="inline-flex items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Retour à la liste</a>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
        <dl class="divide-y divide-slate-200">
            <div class="grid grid-cols-1 gap-2 px-6 py-4 sm:grid-cols-3">
                <dt class="text-sm font-medium text-slate-500">Nom et prénom</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">{{ $stagiaire->prenom }} {{ $stagiaire->nom }}</dd>
            </div>
            <div class="grid grid-cols-1 gap-2 px-6 py-4 sm:grid-cols-3">
                <dt class="text-sm font-medium text-slate-500">Établissement</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">{{ $stagiaire->etablissement }}</dd>
            </div>
            <div class="grid grid-cols-1 gap-2 px-6 py-4 sm:grid-cols-3">
                <dt class="text-sm font-medium text-slate-500">Filière ou formation</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">{{ $stagiaire->filiere }}</dd>
            </div>
            <div class="grid grid-cols-1 gap-2 px-6 py-4 sm:grid-cols-3">
                <dt class="text-sm font-medium text-slate-500">Période de stage</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">Du {{ $stagiaire->date_debut->format('d/m/Y') }} au {{ $stagiaire->date_fin->format('d/m/Y') }}</dd>
            </div>
            <div class="grid grid-cols-1 gap-2 px-6 py-4 sm:grid-cols-3">
                <dt class="text-sm font-medium text-slate-500">Encadrant</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">
                    {{ $stagiaire->encadrant?->prenom }} {{ $stagiaire->encadrant?->nom }}
                    @if($stagiaire->encadrant)
                        <span class="text-slate-500">({{ $stagiaire->encadrant->service }})</span>
                    @endif
                </dd>
            </div>
            <div class="grid grid-cols-1 gap-2 px-6 py-4 sm:grid-cols-3">
                <dt class="text-sm font-medium text-slate-500">Statut</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">{{ $stagiaire->statut }}</dd>
            </div>
            <div class="grid grid-cols-1 gap-2 px-6 py-4 sm:grid-cols-3">
                <dt class="text-sm font-medium text-slate-500">Sujet du stage</dt>
                <dd class="text-sm text-slate-900 sm:col-span-2">{{ $stagiaire->sujet_stage }}</dd>
            </div>
        </dl>
    </div>
@endsection
