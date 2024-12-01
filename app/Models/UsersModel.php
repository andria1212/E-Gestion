<?php

namespace App\Models;

use CodeIgniter\Model;
class UsersModel extends Model
{
 protected $table='users';
 //cle primaire de la table 
 protected $primarykey='id';
    
 protected $allowedFields=['matricule','post','created_at,updated_at','deleted_at'];
 protected $useTimestamps=true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 //regle de validation 
 protected $validationRules =[
    'matricule' =>  'required|min_length[4]|max_length[8]|is_unique[users.matricule]',
    'post'  =>  'required|max_length[255]',
 ];

 protected $validationMessages  =   [
    'matricule' =>  [
      'is_unique'   =>'la matricule doit etre unique .',  
    ],
 ];

 //regle des validation des erreur 

 protected $skipValidation = false;
}
