<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEncadrantRequest;
use App\Http\Requests\UpdateEncadrantRequest;
use App\Models\Encadrant;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EncadrantController extends Controller
{
    public function index(): View
    {
        $encadrants = Encadrant::withCount('stagiaires')
            ->orderBy('nom')
            ->orderBy('prenom')
            ->paginate(10);

        return view('encadrants.index', [
            'encadrants' => $encadrants,
        ]);
    }

    public function create(): View
    {
        return view('encadrants.create');
    }

    public function store(StoreEncadrantRequest $request): RedirectResponse
    {
        Encadrant::create($request->validated());

        return redirect()->route('encadrants.index')
            ->with('success', 'L\'encadrant a été ajouté avec succès.');
    }

    public function edit(Encadrant $encadrant): View
    {
        return view('encadrants.edit', [
            'encadrant' => $encadrant,
        ]);
    }

    public function update(UpdateEncadrantRequest $request, Encadrant $encadrant): RedirectResponse
    {
        $encadrant->update($request->validated());

        return redirect()->route('encadrants.index')
            ->with('success', 'Les informations de l\'encadrant ont été mises à jour.');
    }

    public function destroy(Encadrant $encadrant): RedirectResponse
    {
        if ($encadrant->stagiaires()->exists()) {
            return redirect()->route('encadrants.index')
                ->with('error', 'Impossible de supprimer cet encadrant car des stagiaires lui sont encore affectés. Veuillez d\'abord réaffecter ses stagiaires.');
        }

        $encadrant->delete();

        return redirect()->route('encadrants.index')
            ->with('success', 'L\'encadrant a été supprimé.');
    }
}
