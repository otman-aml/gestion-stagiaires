@extends('layouts.app')

@section('title', 'Ajouter un stagiaire')
@section('header', 'Ajouter un stagiaire')
@section('subheader', 'Renseignez les informations du nouveau stagiaire')

@section('content')
    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <form method="POST" action="{{ route('stagiaires.store') }}">
            @include('stagiaires._form', ['submitLabel' => 'Enregistrer le stagiaire'])
        </form>
    </div>
@endsection
