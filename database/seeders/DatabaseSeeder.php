<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'magibaN',
            'full_name' => 'Nhica Mag-iba',
            'email' => 'magibanhica@gmail.com',
            'created_at' => '2026-09-19 08:10:27',
            'updated_at' => '2026-09-19 08:10:27',
        ]);

        Task::insert([
            [
                'title' => 'Create wireframe',
                'status' => 'completed',
                'task_date' => '2026-09-09',
                'created_at' => '2026-09-05 12:30:00',
                'updated_at' => '2026-09-05 12:30:00',
            ],
            [
                'title' => 'Set up composer',
                'status' => 'completed',
                'task_date' => '2026-09-09',
                'created_at' => '2026-09-05 12:35:00',
                'updated_at' => '2026-09-05 12:35:00',
            ],
            [
                'title' => 'Set up CodeIgniter4',
                'status' => 'completed',
                'task_date' => '2026-09-09',
                'created_at' => '2026-09-05 12:40:00',
                'updated_at' => '2026-09-05 12:40:00',
            ],
            [
                'title' => 'Create code flow',
                'status' => 'completed',
                'task_date' => '2026-09-10',
                'created_at' => '2026-09-05 06:00:00',
                'updated_at' => '2026-09-05 06:00:00',
            ],
            [
                'title' => 'Do code in Visual Studios',
                'status' => 'pending',
                'task_date' => '2026-09-10',
                'created_at' => '2026-09-06 09:30:00',
                'updated_at' => '2026-09-06 09:30:00',
            ],
            [
                'title' => 'Connect Visual Studios in Github',
                'status' => 'pending',
                'task_date' => '2026-09-19',
                'created_at' => '2026-09-06 10:40:00',
                'updated_at' => '2026-09-06 10:40:00',
            ],
            [
                'title' => 'Put code in a free hosting website',
                'status' => 'pending',
                'task_date' => '2026-09-19',
                'created_at' => '2026-09-07 13:45:00',
                'updated_at' => '2026-09-07 13:45:00',
            ],
            [
                'title' => 'Re-check website if working',
                'status' => 'pending',
                'task_date' => '2026-11-07',
                'created_at' => '2026-11-07 22:00:00',
                'updated_at' => '2026-11-07 22:00:00',
            ],
        ]);
    }
}