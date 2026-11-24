<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStagiaireRequest;
use App\Http\Requests\UpdateStagiaireRequest;
use App\Models\Encadrant;
use App\Models\Stagiaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StagiaireController extends Controller
{
    public function index(Request $request): View
    {
        $query = Stagiaire::query()->with('encadrant');

        if ($request->filled('recherche')) {
            $recherche = $request->string('recherche')->toString();
            $query->where(function ($q) use ($recherche) {
                $q->where('nom', 'like', '%' . $recherche . '%')
                    ->orWhere('prenom', 'like', '%' . $recherche . '%');
            });
        }

        if ($request->filled('statut')) {
            $query->where('statut', $request->string('statut')->toString());
        }

        if ($request->filled('encadrant_id')) {
            $query->where('encadrant_id', $request->integer('encadrant_id'));
        }

        $stagiaires = $query->orderBy('nom')->orderBy('prenom')->paginate(10)->withQueryString();
        $encadrants = Encadrant::orderBy('nom')->orderBy('prenom')->get();
        $statuts = Stagiaire::statuts();

        return view('stagiaires.index', [
            'stagiaires' => $stagiaires,
            'encadrants' => $encadrants,
            'statuts' => $statuts,
            'filtres' => [
                'recherche' => $request->input('recherche'),
                'statut' => $request->input('statut'),
                'encadrant_id' => $request->input('encadrant_id'),
            ],
        ]);
    }

    public function create(): View
    {
        return view('stagiaires.create', [
            'encadrants' => Encadrant::orderBy('nom')->orderBy('prenom')->get(),
            'statuts' => Stagiaire::statuts(),
        ]);
    }

    public function store(StoreStagiaireRequest $request): RedirectResponse
    {
        Stagiaire::create($request->validated());

        return redirect()->route('stagiaires.index')
            ->with('success', 'Le stagiaire a été ajouté avec succès.');
    }

    public function show(Stagiaire $stagiaire): View
    {
        $stagiaire->load('encadrant');

        return view('stagiaires.show', [
            'stagiaire' => $stagiaire,
        ]);
    }

    public function edit(Stagiaire $stagiaire): View
    {
        return view('stagiaires.edit', [
            'stagiaire' => $stagiaire,
            'encadrants' => Encadrant::orderBy('nom')->orderBy('prenom')->get(),
            'statuts' => Stagiaire::statuts(),
        ]);
    }

    public function update(UpdateStagiaireRequest $request, Stagiaire $stagiaire): RedirectResponse
    {
        $stagiaire->update($request->validated());

        return redirect()->route('stagiaires.index')
            ->with('success', 'Les informations du stagiaire ont été mises à jour.');
    }

    public function destroy(Stagiaire $stagiaire): RedirectResponse
    {
        $stagiaire->delete();

        return redirect()->route('stagiaires.index')
            ->with('success', 'Le stagiaire a été supprimé.');
    }
}
