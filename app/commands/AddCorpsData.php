<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\CoprsModel;

class AddCorpsData extends BaseCommand
{
    protected $group = 'Custom'; // Optionnel: pour organiser les commandes
    protected $name = 'add:corps'; // Nom de la commande
    protected $description = 'Ajoute des données test dans la table corps';

    public function run(array $params)
    {
        // Crée une instance de votre modèle
        $coprsModel = new CoprsModel();

        // Exemple de données à insérer dans la table
        $data = [
            [
                'sous_operateur' => 'Sous opérateur 1',
                'operateur' => 'Opérateur 1',
                'encadreur' => 'Encadrant 1',
                'Technicien_Superieur' => 'Technicien 1',
                'realisateur_adjoin' => 'Réal 1',
                'realisateur' => 'Réaliseur 1',
                'planificateur' => 'Planif 1',
                'cpci' => 'CPCI 1'
            ],
            [
                'sous_operateur' => 'Sous opérateur 2',
                'operateur' => 'Opérateur 2',
                'encadreur' => 'Encadrant 2',
                'Technicien_Superieur' => 'Technicien 2',
                'realisateur_adjoin' => 'Réal 2',
                'realisateur' => 'Réaliseur 2',
                'planificateur' => 'Planif 2',
                'cpci' => 'CPCI 2'
            ]
        ];

        // Insère les données dans la table
        foreach ($data as $record) {
            $coprsModel->insert($record);
        }

        // Affiche un message de succès
        CLI::write("Les données ont été ajoutées avec succès.", 'green');
    }
}
