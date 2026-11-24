<?php

namespace Database\Seeders;

use App\Models\Encadrant;
use Illuminate\Database\Seeder;

class EncadrantSeeder extends Seeder
{
    public function run(): void
    {
        $encadrants = [
            [
                'prenom' => 'Salma',
                'nom' => 'El Amrani',
                'service' => 'Développement Informatique',
                'email' => 'salma.elamrani@entreprise.ma',
            ],
            [
                'prenom' => 'Youssef',
                'nom' => 'Bennani',
                'service' => 'Comptabilité & Finance',
                'email' => 'youssef.bennani@entreprise.ma',
            ],
            [
                'prenom' => 'Imane',
                'nom' => 'Idrissi',
                'service' => 'Ressources Humaines',
                'email' => 'imane.idrissi@entreprise.ma',
            ],
            [
                'prenom' => 'Mehdi',
                'nom' => 'Alaoui',
                'service' => 'Marketing & Communication',
                'email' => 'mehdi.alaoui@entreprise.ma',
            ],
            [
                'prenom' => 'Hind',
                'nom' => 'Chakiri',
                'service' => 'Commercial',
                'email' => 'hind.chakiri@entreprise.ma',
            ],
            [
                'prenom' => 'Anas',
                'nom' => 'Berrada',
                'service' => 'Logistique',
                'email' => 'anas.berrada@entreprise.ma',
            ],
        ];

        foreach ($encadrants as $encadrant) {
            Encadrant::updateOrCreate(
                ['email' => $encadrant['email']],
                $encadrant
            );
        }
    }
}
