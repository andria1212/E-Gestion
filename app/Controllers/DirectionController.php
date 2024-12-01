<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DirectionModel;
class DirectionController extends BaseController
{
    protected $directionModel;

    public function __construct()
    {
        $this->directionModel = new DirectionModel();
    }
    public function affichageDirection()
    {
        $data = $this->directionModel->findAll();

        // Retourner les données en JSON
        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data
        ]);
    }
    /*
    *
    *enregistrent Direction
    *
    */
    public function Ajout_Direction()
    {
        $input = $this->request->getJSON(true); // Récupère les données JSON envoyées

        if (!$this->validate($this->directionModel->getValidationRules())) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validation échouée',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        $this->directionModel->save($input);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Enregistrement ajouté avec succès.'
        ])->setStatusCode(201);
    }

     /*
    *
    *affichage direction par sont id
    *
    */
    public function showDirection($id)
    {
        $data = $this->directionModel->find($id);

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
    *supprimeer un Direction
    *
    */
    public function deleteDirection($id)
    {
        if (!$this->directionModel->find($id)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "L'enregistrement avec l'ID $id est introuvable."
            ])->setStatusCode(404);
        }

        $this->directionModel->delete($id);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Direction supprimé avec succès.'
        ]);
    }
}
