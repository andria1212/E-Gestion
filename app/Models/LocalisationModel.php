<?php

namespace App\Models;

use CodeIgniter\Model;

class LocalisationModel extends Model
{
    protected $table            = 'localisation';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
   protected $allowedFields=['ville', 'created_at',
   'updated_at', 'deleted_at'];
   protected $useTimestamps=true;
   protected $createdField = 'created_at';
   protected $updatedField = 'updated_at';
   protected $deletedField = 'deleted_at';
   /*
   *
   * regle de validation 
   * 
   */
    protected $validationRules=[
        'ville'=>'required|max_length[50]',
    ];

   protected $skipValidation=false;
}
