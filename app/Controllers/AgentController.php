<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AgentModel;
class AgentController extends BaseController
{
    protected $agentModel;

   
    public function __construct()
    {
        $this->agentModel = new AgentModel();
    }
    /*
    *
    *affichage agence ,mba afahana manao affichage ville sy nom Direction dia nampiasa jointur any table localisation ,direction @ agents tsika 
    *
    */
    public function affichageAgent()
    {
        $data = $this->agentModel

        ->select('agents.* ,localisation.ville,direction.nomDirection')
        ->join('localisation','agents.id_loc=localisation.id')
        ->join('direction','agents.id_direc=direction.id')
        ->findAll();

        // Retourner les données en JSON
        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data
        ]);
    }
     /*
    *
    *enregistrent des agent agents
    *
    */
    public function Ajout_Agent()
    {
        $this->response->setHeader('Access-Control-Allow-Origin', 'http://127.0.0.1:5500')
        ->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');

        $input = $this->request->getJSON(true); // Récupère les données JSON envoyées

        if (!$this->validate($this->agentModel->getValidationRules())) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validation échouée',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        $this->agentModel->save($input);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Enregistrement ajouté avec succès.'
        ])->setStatusCode(201);
    }
     /*
    *
    *affichage agent par sont id
    *
    */
    public function showAgent($id)
    {
        $data = $this->agentModel
        ->select('agents.* ,localisation.ville,direction.nomDirection')
        ->join('localisation','agents.id_loc=localisation.id')
        ->join('direction','agents.id_direc=direction.id')
        ->findAll();

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
    *supprimeer un agent
    *
    */
    public function deleteAgent($id)
    {
        if (!$this->agentModel->find($id)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "L'enregistrement avec l'ID $id est introuvable."
            ])->setStatusCode(404);
        }

        $this->agentModel->delete($id);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'agent supprimé avec succès.'
        ]);
}
}