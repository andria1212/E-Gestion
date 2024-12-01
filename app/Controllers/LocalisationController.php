<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LocalisationModel;
class LocalisationController extends BaseController
{
    protected $localisationModel;
    public function __construct()
    {
        $this->localisationModel    =   new LocalisationModel();
    }
    /*
    *
    **enregistrement des  location
    *
    */
    public function ajout_localisation(){
        $input = $this->request->getJSON(true); // Récupère les données JSON envoyées

        if (!$this->validate($this->localisationModel->getValidationRules())) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validation échouée',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        $this->localisationModel->save($input);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Enregistrement ajouté avec succès.'
        ])->setStatusCode(201);
    }
     /*
    *
    **affichage de tout les villes
    *
    */
     public function affichageLocalisation()
     {
         $data = $this->localisationModel->findAll();
 
         // Retourner les données en JSON
         return $this->response->setJSON([
             'status' => 'success',
             'data' => $data
         ]);
     }
    /*
    *
    **affichage de la ville selectionner 
    *
    */
    public function showLocalisation($id)
    {
        $data = $this->localisationModel->find($id);

        if (!$data) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "L'enregistrement avec l'ID $id est introuvable."
            ])->setStatusCode(404);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data
        ]);
    }
     /*
    *
    **suppression de la ville
    *
    */
    public function deleteLocalisation($id)
    {
        if (!$this->localisationModel->find($id)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "L'enregistrement avec l'ID $id est introuvable."
            ])->setStatusCode(404);
        }

        $this->localisationModel->delete($id);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Enregistrement supprimé avec succès.'
        ]);
    }
}
