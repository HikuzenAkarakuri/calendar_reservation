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

    public function authenticate(){
       
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        
        return ($this->userService->authenticate($email, $senha)) ? redirect()->to('/dashboard') : redirect()->back();

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
}
