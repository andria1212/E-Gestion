<?php

namespace App\Models;

use CodeIgniter\Model;

class AgentModel extends Model
{
    protected $table            = 'agents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields=[
        'nom_agent',
        'prenom_agent',
        'date_naissance',
        'email',
        'id_loc',
        'id_corps',
        'id_direc',
        'situation_marital',
        'contact',
        'grade',
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
  protected $validationRules = [
    'nom_agent' => 'required|max_length[30]',
    'prenom_agent' => 'required|max_length[30]',
    'date_naissance' => 'required|valid_date',
    'email' => 'required|valid_email|max_length[50]|is_unique[agents.email,id,{id}]',
    'contact' => 'required|max_length[30]|is_unique[agents.contact,id,{id}]',
    'grade' => 'required|max_length[15]',
    'situation_marital' => 'required|max_length[30]'
];
/*
*
*si l'email est deja utiliser 
*
*/
protected $validationMessages = [
    'email' => [
        'is_unique' => 'Cet email est déjà enregistré.',
    ],
    'contact' => [
        'is_unique' => 'Ce contact est déjà utilisé.',
    ],
];
   protected $skipValidation=false;
}
