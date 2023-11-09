<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\SalaService;
use CodeIgniter\Config\Factories;

class Calendario extends BaseController
{

    private $salaService;

    public function __construct()
    {
        $this->salaService = new SalaService();
    }

    public function index(){

        $dado['salas'] = $this->salaService->getSalas();

        echo view('calendar',$dado);
    }

   
     

}