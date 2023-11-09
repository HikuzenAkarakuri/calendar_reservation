<?php

namespace App\Services;

use App\Entities\Sala;
use App\Models\SalaModel;
use CodeIgniter\Config\Factories;

class SalaService{

    protected $salaModel;

    public function __construct(){

        $this->salaModel = Factories::models(SalaModel::class);

    }

    public function getSalas(){
        return $this->salaModel->findAll();
    }

    public function createSala(){
        
    }

}