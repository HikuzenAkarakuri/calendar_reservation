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

    public function acharSala(){

        $dado['salas'] = $this->salaService->getSalas();

        echo view('calendar',$dado);

        $eventosModel = new \App\Models\EventosModel();

    $eventos = $eventosModel->findAll(); // Busca todos os eventos no banco de dados

    // Converter os eventos para o formato aceito pelo FullCalendar
    $data['eventos'] = [];
    foreach ($eventos as $evento) {
        $data['eventos'][] = [
            'title' => $evento->titulo,
            'start' => date('Y-m-d\TH:i:s', strtotime($evento->data_inicio)),
            'end' => date('Y-m-d\TH:i:s', strtotime($evento->data_fim)),
            // Adicione outras propriedades conforme necessário
        ];
    }

    return view('calendar', $data);


    }
     

}