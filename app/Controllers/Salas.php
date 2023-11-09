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

    


}
