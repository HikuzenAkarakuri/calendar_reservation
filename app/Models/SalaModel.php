<?php

namespace App\Models;

use App\Entities\Sala;
use CodeIgniter\Model;

class SalaModel extends Model
{
    protected $table = 'salas';
    protected $primaryKey = 'id';
    protected $returnType = Sala::class;
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nome', 'tipo'];

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
}
