<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'tanggal_lahir'      => [
                'type'           => 'DATE',
            ],
            'gaji' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'null'           => true,
            ],
            'status'      => [
                'type'           => 'bool'
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('karyawan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('karyawan');
    }
}
