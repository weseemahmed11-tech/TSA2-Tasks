<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTsa2AuthenticationAndArchiving extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'password' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'email'],
        ]);

        $this->forge->addColumn('tasks', [
            'is_archived' => ['type' => 'TINYINT', 'constraint' => 1, 'unsigned' => true, 'default' => 0, 'after' => 'created_at'],
        ]);

        $this->db->table('users')
            ->where('username', 'demo.user')
            ->update(['password' => password_hash('Password123', PASSWORD_DEFAULT)]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'password');
        $this->forge->dropColumn('tasks', 'is_archived');
    }
}
