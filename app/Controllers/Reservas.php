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

    // debug($this->request->getPost());

    $evento = new Eventos($data);

    $eventosModel->insert($evento);

    return redirect()->to('/calendar')->with('message', 'Evento criado com sucesso!');
}

public function editarEvento($id)
{
    $eventosModel = new \App\Models\EventosModel();
    $evento = $eventosModel->find($id);

    if ($evento) {
        // Aqui você pode carregar uma view para editar o evento
        // Exemplo: return view('editar_evento', ['evento' => $evento]);
    } else {
        return redirect()->to('/calendar')->with('error', 'Evento não encontrado');
    }
}

public function atualizarEvento($id)
{
    $eventosModel = new \App\Models\EventosModel();
    $evento = $eventosModel->find($id);

    if ($evento) {
        // Atualizar os dados do evento com os novos valores do formulário
        $evento->data_inicio = $this->request->getPost('data_inicio');
        $evento->data_fim = $this->request->getPost('data_fim');
        $evento->titulo = $this->request->getPost('titulo');
        $evento->descricao = $this->request->getPost('descrição');
        $evento->sala_id = $this->request->getPost('sala_id');

        // Salvar as alterações
        $eventosModel->save($evento);

        return redirect()->to('/calendar')->with('message', 'Evento atualizado com sucesso!');
    } else {
        return redirect()->to('/calendar')->with('error', 'Evento não encontrado');
    }
}

public function deletarEvento($id)
{
    $eventosModel = new \App\Models\EventosModel();
    $evento = $eventosModel->find($id);

    if ($evento) {
        // Deletar o evento do banco de dados
        $eventosModel->delete($id);

        return redirect()->to('/calendar')->with('message', 'Evento deletado com sucesso!');
    } else {
        return redirect()->to('/calendar')->with('error', 'Evento não encontrado');
    }
}

    public function buscarEvento(){

    }


public function buscarSala()
{
    // $salaModel = new \App\Models\SalaModel();
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
