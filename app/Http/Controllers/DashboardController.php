<?php

namespace App\Http\Controllers;

use App\Models\Encadrant;
use App\Models\Stagiaire;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalStagiaires = Stagiaire::count();
        $stagiairesEnCours = Stagiaire::where('statut', Stagiaire::STATUT_EN_COURS)->count();
        $stagesTermines = Stagiaire::where('statut', Stagiaire::STATUT_TERMINE)->count();

        $stagiairesParEncadrant = Encadrant::withCount('stagiaires')
            ->orderBy('nom')
            ->orderBy('prenom')
            ->get();

        $maxStagiairesParEncadrant = max($stagiairesParEncadrant->max('stagiaires_count') ?? 0, 1);

        return view('dashboard', [
            'totalStagiaires' => $totalStagiaires,
            'stagiairesEnCours' => $stagiairesEnCours,
            'stagesTermines' => $stagesTermines,
            'stagiairesParEncadrant' => $stagiairesParEncadrant,
            'maxStagiairesParEncadrant' => $maxStagiairesParEncadrant,
        ]);
    }
}
