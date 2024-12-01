<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CoprsModel;

class CorpsController extends BaseController
{
    protected $coprsModel;

    public function __construct()
    {
        $this->coprsModel = new CoprsModel();
    }

    // Afficher tous les enregistrements
    public function index()
    {
        $data = $this->coprsModel->findAll();

        // Retourner les données en JSON
        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data
        ]);
    }

    // Enregistrer un nouvel enregistrement
    public function store()
    {
        $input = $this->request->getJSON(true); // Récupère les données JSON envoyées

        if (!$this->validate($this->coprsModel->getValidationRules())) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validation échouée',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        $this->coprsModel->save($input);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Enregistrement ajouté avec succès.'
        ])->setStatusCode(201);
    }

    // Mettre à jour un enregistrement
    public function update($id)
    {
        $input = $this->request->getJSON(true);

        if (!$this->validate($this->coprsModel->getValidationRules())) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validation échouée',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        if (!$this->coprsModel->find($id)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "L'enregistrement avec l'ID $id est introuvable."
            ])->setStatusCode(404);
        }

        $this->coprsModel->update($id, $input);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Enregistrement mis à jour avec succès.'
        ]);
    }

    // Supprimer un enregistrement
    public function delete($id)
    {
        if (!$this->coprsModel->find($id)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "L'enregistrement avec l'ID $id est introuvable."
            ])->setStatusCode(404);
        }

        $this->coprsModel->delete($id);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Enregistrement supprimé avec succès.'
        ]);
    }

    // Afficher un enregistrement spécifique
    public function show($id)
    {
        $data = $this->coprsModel->find($id);

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
}
