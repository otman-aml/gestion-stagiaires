<?php

namespace Database\Seeders;

use App\Models\Encadrant;
use App\Models\Stagiaire;
use Illuminate\Database\Seeder;

class StagiaireSeeder extends Seeder
{
    public function run(): void
    {
        $encadrants = Encadrant::all()->keyBy('email');

        $stagiaires = [
            // À venir (8)
            [
                'prenom' => 'Aya', 'nom' => 'Benali',
                'etablissement' => 'ENSA Marrakech', 'filiere' => 'Génie Informatique',
                'date_debut' => '2026-07-01', 'date_fin' => '2026-08-31',
                'sujet_stage' => 'Développement d\'un module de suivi des congés en Laravel',
                'statut' => Stagiaire::STATUT_A_VENIR,
                'encadrant_email' => 'salma.elamrani@entreprise.ma',
            ],
            [
                'prenom' => 'Hamza', 'nom' => 'El Fassi',
                'etablissement' => 'ENCG Casablanca', 'filiere' => 'Audit et Contrôle de Gestion',
                'date_debut' => '2026-07-15', 'date_fin' => '2026-09-15',
                'sujet_stage' => 'Analyse des écarts budgétaires et proposition d\'indicateurs de suivi',
                'statut' => Stagiaire::STATUT_A_VENIR,
                'encadrant_email' => 'youssef.bennani@entreprise.ma',
            ],
            [
                'prenom' => 'Sara', 'nom' => 'Kabbaj',
                'etablissement' => 'ISCAE Casablanca', 'filiere' => 'Management des Ressources Humaines',
                'date_debut' => '2026-08-01', 'date_fin' => '2026-09-30',
                'sujet_stage' => 'Mise à jour du processus d\'intégration des nouveaux collaborateurs',
                'statut' => Stagiaire::STATUT_A_VENIR,
                'encadrant_email' => 'imane.idrissi@entreprise.ma',
            ],
            [
                'prenom' => 'Omar', 'nom' => 'Tahiri',
                'etablissement' => 'ENCG Settat', 'filiere' => 'Marketing et Action Commerciale',
                'date_debut' => '2026-07-10', 'date_fin' => '2026-08-20',
                'sujet_stage' => 'Étude de satisfaction clients et recommandations de fidélisation',
                'statut' => Stagiaire::STATUT_A_VENIR,
                'encadrant_email' => 'mehdi.alaoui@entreprise.ma',
            ],
            [
                'prenom' => 'Meryem', 'nom' => 'Chraibi',
                'etablissement' => 'Université Mohammed V', 'filiere' => 'Sciences Économiques et Gestion',
                'date_debut' => '2026-09-01', 'date_fin' => '2026-10-31',
                'sujet_stage' => 'Élaboration d\'un plan de prospection pour le segment PME',
                'statut' => Stagiaire::STATUT_A_VENIR,
                'encadrant_email' => 'hind.chakiri@entreprise.ma',
            ],
            [
                'prenom' => 'Yassine', 'nom' => 'Lahlou',
                'etablissement' => 'FST Settat', 'filiere' => 'Génie Industriel',
                'date_debut' => '2026-08-15', 'date_fin' => '2026-10-15',
                'sujet_stage' => 'Optimisation du circuit de réception et de stockage des fournitures',
                'statut' => Stagiaire::STATUT_A_VENIR,
                'encadrant_email' => 'anas.berrada@entreprise.ma',
            ],
            [
                'prenom' => 'Nisrine', 'nom' => 'Zerouali',
                'etablissement' => 'EMSI Rabat', 'filiere' => 'Ingénierie Informatique et Réseaux',
                'date_debut' => '2026-07-20', 'date_fin' => '2026-09-20',
                'sujet_stage' => 'Mise en place d\'un portail interne de partage documentaire',
                'statut' => Stagiaire::STATUT_A_VENIR,
                'encadrant_email' => 'salma.elamrani@entreprise.ma',
            ],
            [
                'prenom' => 'Amine', 'nom' => 'Ouazzani',
                'etablissement' => 'ENCG Agadir', 'filiere' => 'Finance et Comptabilité',
                'date_debut' => '2026-09-10', 'date_fin' => '2026-11-10',
                'sujet_stage' => 'Automatisation du rapprochement bancaire sous Excel VBA',
                'statut' => Stagiaire::STATUT_A_VENIR,
                'encadrant_email' => 'youssef.bennani@entreprise.ma',
            ],

            // En cours (10)
            [
                'prenom' => 'Rania', 'nom' => 'Moutaouakkil',
                'etablissement' => 'ENSAM Casablanca', 'filiere' => 'Génie Industriel',
                'date_debut' => '2026-03-02', 'date_fin' => '2026-06-30',
                'sujet_stage' => 'Suivi des indicateurs logistiques et amélioration des délais d\'approvisionnement',
                'statut' => Stagiaire::STATUT_EN_COURS,
                'encadrant_email' => 'anas.berrada@entreprise.ma',
            ],
            [
                'prenom' => 'Ilyas', 'nom' => 'Benkirane',
                'etablissement' => 'EHTP Casablanca', 'filiere' => 'Systèmes d\'Information',
                'date_debut' => '2026-02-16', 'date_fin' => '2026-07-15',
                'sujet_stage' => 'Développement d\'un module de gestion des factures en Laravel',
                'statut' => Stagiaire::STATUT_EN_COURS,
                'encadrant_email' => 'salma.elamrani@entreprise.ma',
            ],
            [
                'prenom' => 'Kawtar', 'nom' => 'El Idrissi',
                'etablissement' => 'ENCG Casablanca', 'filiere' => 'Management et Stratégie d\'Entreprise',
                'date_debut' => '2026-04-01', 'date_fin' => '2026-06-30',
                'sujet_stage' => 'Mise en place d\'un tableau de bord décisionnel sous Power BI',
                'statut' => Stagiaire::STATUT_EN_COURS,
                'encadrant_email' => 'youssef.bennani@entreprise.ma',
            ],
            [
                'prenom' => 'Soufiane', 'nom' => 'Ait Lahcen',
                'etablissement' => 'Université Cadi Ayyad', 'filiere' => 'Gestion des Ressources Humaines',
                'date_debut' => '2026-03-16', 'date_fin' => '2026-06-15',
                'sujet_stage' => 'Digitalisation des dossiers du personnel et suivi des présences',
                'statut' => Stagiaire::STATUT_EN_COURS,
                'encadrant_email' => 'imane.idrissi@entreprise.ma',
            ],
            [
                'prenom' => 'Hajar', 'nom' => 'Slaoui',
                'etablissement' => 'ENCG Tanger', 'filiere' => 'Marketing Digital',
                'date_debut' => '2026-04-15', 'date_fin' => '2026-07-15',
                'sujet_stage' => 'Refonte du calendrier éditorial et animation des réseaux sociaux',
                'statut' => Stagiaire::STATUT_EN_COURS,
                'encadrant_email' => 'mehdi.alaoui@entreprise.ma',
            ],
            [
                'prenom' => 'Adil', 'nom' => 'Bouziane',
                'etablissement' => 'ISCAE Casablanca', 'filiere' => 'Commerce et Développement des Affaires',
                'date_debut' => '2026-02-01', 'date_fin' => '2026-06-30',
                'sujet_stage' => 'Analyse du portefeuille clients et préparation des offres commerciales',
                'statut' => Stagiaire::STATUT_EN_COURS,
                'encadrant_email' => 'hind.chakiri@entreprise.ma',
            ],
            [
                'prenom' => 'Salma', 'nom' => 'Naciri',
                'etablissement' => 'EMSI Casablanca', 'filiere' => 'Informatique et Réseaux',
                'date_debut' => '2026-03-01', 'date_fin' => '2026-07-31',
                'sujet_stage' => 'Refonte du site vitrine avec WordPress',
                'statut' => Stagiaire::STATUT_EN_COURS,
                'encadrant_email' => 'salma.elamrani@entreprise.ma',
            ],
            [
                'prenom' => 'Youssef', 'nom' => 'Raji',
                'etablissement' => 'FST Settat', 'filiere' => 'Logistique et Transport',
                'date_debut' => '2026-04-01', 'date_fin' => '2026-06-30',
                'sujet_stage' => 'Cartographie des flux logistiques et réduction des coûts de transport',
                'statut' => Stagiaire::STATUT_EN_COURS,
                'encadrant_email' => 'anas.berrada@entreprise.ma',
            ],
            [
                'prenom' => 'Imane', 'nom' => 'Mekouar',
                'etablissement' => 'ENCG Fès', 'filiere' => 'Comptabilité, Finance et Fiscalité',
                'date_debut' => '2026-05-01', 'date_fin' => '2026-07-31',
                'sujet_stage' => 'Préparation des états de rapprochement fournisseurs et suivi des paiements',
                'statut' => Stagiaire::STATUT_EN_COURS,
                'encadrant_email' => 'youssef.bennani@entreprise.ma',
            ],
            [
                'prenom' => 'Othmane', 'nom' => 'Berrada',
                'etablissement' => 'Université Hassan II', 'filiere' => 'Communication et Médias',
                'date_debut' => '2026-05-10', 'date_fin' => '2026-07-10',
                'sujet_stage' => 'Création de supports de communication pour les offres de services',
                'statut' => Stagiaire::STATUT_EN_COURS,
                'encadrant_email' => 'mehdi.alaoui@entreprise.ma',
            ],

            // Terminés (7)
            [
                'prenom' => 'Asmaa', 'nom' => 'Guerrouj',
                'etablissement' => 'ENSA Kenitra', 'filiere' => 'Génie Informatique',
                'date_debut' => '2025-11-03', 'date_fin' => '2026-01-31',
                'sujet_stage' => 'Conception d\'une application interne de gestion des demandes de support',
                'statut' => Stagiaire::STATUT_TERMINE,
                'encadrant_email' => 'salma.elamrani@entreprise.ma',
            ],
            [
                'prenom' => 'Nabil', 'nom' => 'Skalli',
                'etablissement' => 'ENCG Casablanca', 'filiere' => 'Gestion Financière et Comptable',
                'date_debut' => '2025-12-01', 'date_fin' => '2026-02-28',
                'sujet_stage' => 'Mise en place d\'un fichier de suivi de la trésorerie mensuelle',
                'statut' => Stagiaire::STATUT_TERMINE,
                'encadrant_email' => 'youssef.bennani@entreprise.ma',
            ],
            [
                'prenom' => 'Chaimae', 'nom' => 'Lazrak',
                'etablissement' => 'Université Mohammed V', 'filiere' => 'Psychologie du Travail',
                'date_debut' => '2026-01-05', 'date_fin' => '2026-03-05',
                'sujet_stage' => 'Enquête interne sur le climat social et propositions d\'amélioration',
                'statut' => Stagiaire::STATUT_TERMINE,
                'encadrant_email' => 'imane.idrissi@entreprise.ma',
            ],
            [
                'prenom' => 'Walid', 'nom' => 'Qadiri',
                'etablissement' => 'ENCG Marrakech', 'filiere' => 'Marketing et Communication Commerciale',
                'date_debut' => '2025-10-01', 'date_fin' => '2025-12-31',
                'sujet_stage' => 'Lancement d\'une campagne de notoriété sur LinkedIn',
                'statut' => Stagiaire::STATUT_TERMINE,
                'encadrant_email' => 'mehdi.alaoui@entreprise.ma',
            ],
            [
                'prenom' => 'Ikram', 'nom' => 'Amrani',
                'etablissement' => 'ISCAE Casablanca', 'filiere' => 'Management Commercial',
                'date_debut' => '2026-01-15', 'date_fin' => '2026-03-15',
                'sujet_stage' => 'Qualification des prospects et mise à jour du fichier CRM',
                'statut' => Stagiaire::STATUT_TERMINE,
                'encadrant_email' => 'hind.chakiri@entreprise.ma',
            ],
            [
                'prenom' => 'Reda', 'nom' => 'El Alami',
                'etablissement' => 'EST Casablanca', 'filiere' => 'Gestion Logistique et Transport',
                'date_debut' => '2025-11-15', 'date_fin' => '2026-01-15',
                'sujet_stage' => 'Mise en place d\'un suivi des commandes fournisseurs sous Excel',
                'statut' => Stagiaire::STATUT_TERMINE,
                'encadrant_email' => 'anas.berrada@entreprise.ma',
            ],
            [
                'prenom' => 'Lina', 'nom' => 'Benkaddour',
                'etablissement' => 'EMSI Marrakech', 'filiere' => 'Ingénierie des Systèmes Informatiques',
                'date_debut' => '2025-12-10', 'date_fin' => '2026-02-10',
                'sujet_stage' => 'Automatisation de la génération des rapports mensuels d\'activité',
                'statut' => Stagiaire::STATUT_TERMINE,
                'encadrant_email' => 'salma.elamrani@entreprise.ma',
            ],
        ];

        foreach ($stagiaires as $stagiaire) {
            $encadrant = $encadrants->get($stagiaire['encadrant_email']);
            if (! $encadrant) {
                continue;
            }

            Stagiaire::updateOrCreate(
                [
                    'nom' => $stagiaire['nom'],
                    'prenom' => $stagiaire['prenom'],
                    'date_debut' => $stagiaire['date_debut'],
                ],
                [
                    'etablissement' => $stagiaire['etablissement'],
                    'filiere' => $stagiaire['filiere'],
                    'date_fin' => $stagiaire['date_fin'],
                    'sujet_stage' => $stagiaire['sujet_stage'],
                    'encadrant_id' => $encadrant->id,
                    'statut' => $stagiaire['statut'],
                ]
            );
        }
    }
}
