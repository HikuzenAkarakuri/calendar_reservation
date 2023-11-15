<?php

namespace App\Models;

use CodeIgniter\Model;
 
class EventosModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'eventos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Eventos'; // Especifica a entidade para retorno
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['sala_id', 'data_inicio', 'data_fim', 'users_id', 'titulo', 'descrição']; // Defina os campos permitidos para preenchimento

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function atualizarEvento($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletarEvento($id)
    {
        return $this->delete($id);
    }


}
