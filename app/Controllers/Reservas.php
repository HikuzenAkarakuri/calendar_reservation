<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Eventos;

class Reservas extends BaseController
{
    public function index(){
        echo view('');
    }

    public function criarEvento()
{
    $eventosModel = new \App\Models\EventosModel();

    $data = [
        'data_inicio' => $this->request->getPost('data_inicio'),
        'data_fim' => $this->request->getPost('data_fim'),
        'titulo' => $this->request->getPost('titulo'),
        'descricao' => $this->request->getPost('descricao'),
        'sala_id' => $this->request->getPost('sala_id'),
        'users_id' => $this->request->getPost('users_id'),
    ];

    $evento = new Eventos($data);

    $eventosModel->insert($evento);

    return redirect()->to('/calendar')->with('message', 'Evento criado com sucesso!');
}

    public function editarEvento(){

    }

    public function atualizarEvento(){

    }

    public function deletarEvento(){

    }

    public function buscarEvento(){

    }

    public function salvarEvento(){

    }

    public function buscarSala(){
        $salaModel = new \App\Models\SalaModel();
        $data['salas'] = $salaModel->findAll(); // Busca todas as salas no banco de dados

        return view('calendar', $data); // Passa os dados das salas para a view "calendar" 
    }


}
