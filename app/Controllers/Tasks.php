<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())->orderBy('task_date', 'ASC')->orderBy('id', 'ASC')->findAll();

        return view('partials/header', ['title' => 'Task List'])
            . view('tasks/index', ['tasks' => $tasks])
            . view('partials/footer');
    }
}
