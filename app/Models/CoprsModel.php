<?php

namespace App\Models;

use CodeIgniter\Model;

class CoprsModel extends Model
{
  protected $table='corps';
  protected $primaryKey='id';
  
  protected $allowedFields=['sous_operateur','operateur','encadreur','Technicien_Superieur','realisateur_adjoin','realisateur','planificateur','cpci','created_at','updated_at', 'deleted_at'];
  protected $useTimestamps=true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  protected $deletedField = 'deleted_at';
  //regle de validation

  protected $validationRules =[
    'sous_operateur'  =>'required|max_length[255]',
    'operateur'  =>'required|max_length[255]',
    'encadreur'  =>'required|max_length[255]',
    'Technicien_Superieur'  =>'required|max_length[255]',
    'realisateur_adjoin'  =>'required|max_length[255]',
    'realisateur'=> 'required|max_length[255]',
    'planificateur'  =>'required|max_length[255]',
    'cpci'  =>'required|max_length[255]',
  ];

  protected $skipValidation = false;
  
}
