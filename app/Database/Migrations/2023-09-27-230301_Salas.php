<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Salas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'tipo' => [
                'type' => 'INT',
                'constraint' => 11
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('salas');
    }

    public function down()
    {
        //
    }
}
