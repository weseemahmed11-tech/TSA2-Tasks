<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Tsa1Seeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'username' => 'demo.user',
            'full_name' => 'Demo User',
            'email' => 'demo.user@example.com',
            'created_at' => '2026-10-09 08:00:00',
        ]);

        $this->db->table('tasks')->insertBatch([
            ['title' => 'Review assessment brief', 'status' => 'Completed', 'task_date' => '2026-10-09', 'created_at' => '2026-10-08 09:00:00'],
            ['title' => 'Plan task database', 'status' => 'In Progress', 'task_date' => '2026-10-09', 'created_at' => '2026-10-08 09:15:00'],
            ['title' => 'Build welcome page', 'status' => 'Pending', 'task_date' => '2026-10-09', 'created_at' => '2026-10-08 09:30:00'],
            ['title' => 'Create task list view', 'status' => 'Pending', 'task_date' => '2026-10-10', 'created_at' => '2026-10-08 09:45:00'],
            ['title' => 'Check profile page', 'status' => 'Pending', 'task_date' => '2026-10-10', 'created_at' => '2026-10-08 10:00:00'],
            ['title' => 'Write project README', 'status' => 'Pending', 'task_date' => '2026-10-11', 'created_at' => '2026-10-08 10:15:00'],
            ['title' => 'Review navigation links', 'status' => 'Pending', 'task_date' => '2026-10-11', 'created_at' => '2026-10-08 10:30:00'],
            ['title' => 'Prepare final submission', 'status' => 'Pending', 'task_date' => '2026-10-12', 'created_at' => '2026-10-08 10:45:00'],
        ]);
    }
}
