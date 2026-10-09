<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Pages extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())->where('task_date', date('Y-m-d'))->findAll();

        return view('partials/header', ['title' => 'Welcome'])
            . view('pages/home', ['tasks' => $tasks, 'today' => date('Y-m-d')])
            . view('partials/footer');
    }

    public function about(): string
    {
        return view('partials/header', ['title' => 'About'])
            . view('pages/about')
            . view('partials/footer');
    }
}
