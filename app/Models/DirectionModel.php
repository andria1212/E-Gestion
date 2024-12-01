<?php

namespace App\Models;

use CodeIgniter\Model;

class DirectionModel extends Model
{
    protected $table            = 'direction';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields=['nomDirection','created_at','updated_at','deleted_at'];
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
        'nomDirection'=>'required|max_length[30]',
    ];
   protected $skipValidation=false;
}
