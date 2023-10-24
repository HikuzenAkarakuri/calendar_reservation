<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class Eventos extends Migration
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
            'sala_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'data_inicio' => [
                'type' => 'timestamp',
            ],
            'data_fim' => [
                'type' => 'datetime'
            ],
            'users_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => '60'
            ],
            'descrição' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('sala_id', 'salas', 'id');
        $this->forge->addForeignKey('users_id', 'users', 'id');
        $this->forge->createTable('eventos');
    }

    public function down()
    {
        //
    }
}
