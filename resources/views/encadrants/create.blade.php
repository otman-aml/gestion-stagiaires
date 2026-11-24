@extends('layouts.app')

@section('title', 'Ajouter un encadrant')
@section('header', 'Ajouter un encadrant')
@section('subheader', 'Renseignez les informations du nouvel encadrant')

@section('content')
    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <form method="POST" action="{{ route('encadrants.store') }}">
            @include('encadrants._form', ['submitLabel' => 'Enregistrer l\'encadrant'])
        </form>
    </div>
@endsection
