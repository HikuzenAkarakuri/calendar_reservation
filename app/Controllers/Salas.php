<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Sala;

class Salas extends BaseController
{
    public function index()
    {
        echo view('create_sala');
    }

//     public function buscarSala()
// {
//     // $salaModel = new \App\Models\SalaModel();
//     $eventosModel = new \App\Models\EventosModel();

//     $eventos = $eventosModel->findAll(); // Busca todos os eventos no banco de dados

//     // Converter os eventos para o formato aceito pelo FullCalendar
//     $data['eventos'] = [];
//     foreach ($eventos as $evento) {
//         $data['eventos'][] = [
//             'title' => $evento->titulo,
//             'start' => date('Y-m-d\TH:i:s', strtotime($evento->data_inicio)),
//             'end' => date('Y-m-d\TH:i:s', strtotime($evento->data_fim)),
//             // Adicione outras propriedades conforme necessário
//         ];
//     }

//     return view('calendar', $data);

    
// }

public function createSalas(){

    echo view('create_sala');

}


}
