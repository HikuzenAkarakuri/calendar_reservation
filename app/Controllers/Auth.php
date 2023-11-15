<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Services\UserService;
use CodeIgniter\Config\Factories;

class Auth extends BaseController
{ 

    private $userService;

    public function __construct()
    {
        $this->userService = Factories::class(UserService::class);
    }

    public function index()
    {
        echo view('login');
    }

    public function register()
    {
        echo view('register');
    }

    
    public function authenticate()
{
    $email = $this->request->getPost('email');
    $senha = $this->request->getPost('senha');

    // Realize a autenticação do usuário e obtenha o ID do usuário (substitua isso com sua lógica de autenticação)
    $userId = $this->userService->authenticate($email, $senha);

    if ($userId) {
        // Armazene o ID do usuário na sessão
        session()->set('user_id', $userId);
        return redirect()->to('/dashboard');
    } else {
        return redirect()->back();
    }
}



    public function createUser(){

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        $userModel = new \App\Models\UserModel();
    
        //entidade sendo criada
        $user = new User();
        $user->email = $email;
        $user->setPassword($password);
    
        // validação
        if (!$userModel->save($user)) {
            // Se falhar volta pro register
            return redirect()->route('register')->withInput()->with('errors', $userModel->errors());
        }
    
        return redirect()->route('/')->with('success', 'Usuário registrado com sucesso!');
        }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }

    public function deleteUser(){
        
    }

public function acessar(){
    echo view('update_user');
}


public function updateUser()
{
    // Recupere o ID do usuário atual (você pode alterar isso de acordo com sua lógica)
    $userId = session()->get('user_id');

    // Recupere os dados do formulário
    $email = $this->request->getPost('email');
    $newPassword = $this->request->getPost('password');

    // Obtenha o modelo do usuário
    $userModel = new \App\Models\UserModel();

    // Recupere o usuário existente como objeto
    $user = $userModel->asObject()->find($userId);

    if (empty($user)) {
        return redirect()->to('/dashboard')->with('error', 'Usuário não encontrado');
    }

    // Atualize os campos, se fornecidos
    if (!empty($email)) {
        $user->email = $email;
    }

    if (!empty($newPassword)) {
        $user->setPassword($newPassword);
    }

    // Validação dos dados do usuário
    if (!$userModel->updateUser($user)) {
        return redirect()->to('/dashboard')->with('error', 'Falha ao atualizar as informações do usuário');
    }

    return redirect()->to('/dashboard')->with('success', 'Informações do usuário atualizadas com sucesso');
}


}
