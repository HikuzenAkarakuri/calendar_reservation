<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $allowedFields    = ['email', 'password', 'created_at'];
    protected $returnType = User::class;

    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
    ];

    public function getUser($email){
      
        return $this->where('email', $email)->first();
    }
}
