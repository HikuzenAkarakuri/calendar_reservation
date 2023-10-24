<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Eventos extends Entity
{
    protected $datamap = [];
    protected $attributes = [
        'id' => null,
        'data_inicio' => null,
        'data_fim' => null,
        'titulo' => null,
        'descricao' => null,
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
