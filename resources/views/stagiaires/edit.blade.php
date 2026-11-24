@extends('layouts.app')

@section('title', 'Modifier un stagiaire')
@section('header', 'Modifier un stagiaire')
@section('subheader', 'Mettez à jour les informations du stagiaire')

@section('content')
    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <form method="POST" action="{{ route('stagiaires.update', $stagiaire) }}">
            @include('stagiaires._form', ['submitLabel' => 'Mettre à jour'])
        </form>
    </div>
@endsection
