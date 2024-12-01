<?php

namespace App\Models;

use CodeIgniter\Model;

class FamilleModel extends Model
{
    protected $table            = 'familles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields=[
        'nom_famille',
        'id_agent',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $useTimestamps=true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
     /*
   *
   * regle de validation 
   * 
   */
  protected $validationRules =[
    'nom_famille'=>'required|max_length[50]',
  ];
}
