@extends('layouts.app')

@section('title', 'Modifier un encadrant')
@section('header', 'Modifier un encadrant')
@section('subheader', 'Mettez à jour les informations de l\'encadrant')

@section('content')
    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <form method="POST" action="{{ route('encadrants.update', $encadrant) }}">
            @include('encadrants._form', ['submitLabel' => 'Mettre à jour'])
        </form>
    </div>
@endsection
