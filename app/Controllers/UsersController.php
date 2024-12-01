<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
class UsersController extends BaseController
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel  =new UsersModel();
    }
        
    /*
    enregistrement des information de l'utilisateur;
    */
    public function store()
    {
        $input = $this->request->getJSON(true); // Récupère les données JSON envoyées

        if (!$this->validate($this->userModel->getValidationRules())) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validation échouée',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        $this->userModel->save($input);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Enregistrement ajouté avec succès.'
        ])->setStatusCode(201);
    }

    /*
    suppression d'utilisateur
    */
    public function supprimer_User($id){
        if(!$this->userModel->find($id)){
            return $this->response->setJSON([
                'status'=>'error',
                'message'=>'utiilisateur non trouver'
            ])->setStatusCode(404);
        }
        $this->userModel->delete($id);
        return $this->response->setJSON([
            'status'=>'success',
            'message'=>'utilisateur supprimer avec succee'
        ]);
    }

        /*
        methode pour afficher les utilisateur enregistrer 
        */
    public function Affichage_utilisateur(){
        $enregistrement=$this->userModel->findAll();
        return $this->response->setJSON([
            'status'=>'success',
            'data'=>$enregistrement
        ]);
    }

        /*
        Affichage des utilisateurs enregistrer mais seulement 
        */
    public function show_utilisateur($id)
    {
        $data = $this->userModel->find($id);

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
