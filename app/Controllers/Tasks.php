<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())->where('is_archived', 0)->orderBy('task_date', 'ASC')->orderBy('id', 'ASC')->findAll();

        return view('partials/header', ['title' => 'Task List'])
            . view('tasks/index', ['tasks' => $tasks])
            . view('partials/footer');
    }

    public function newTask(): string
    {
        return view('partials/header', ['title' => 'New Task'])
            . view('tasks/form', ['task' => null, 'action' => site_url('tasks'), 'heading' => 'New Task'])
            . view('partials/footer');
    }

    public function create()
    {
        $data = $this->taskData();

        if (! $this->validateData($data, [
            'title' => 'required',
            'task_date' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->insert($data + [
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to(site_url('tasks'))->with('message', 'Task created successfully.');
    }

    public function edit(int $id): string
    {
        $task = (new TaskModel())->where('is_archived', 0)->find($id);

        if ($task === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('partials/header', ['title' => 'Edit Task'])
            . view('tasks/form', ['task' => $task, 'action' => site_url('tasks/' . $id), 'heading' => 'Edit Task'])
            . view('partials/footer');
    }

    public function update(int $id)
    {
        $model = new TaskModel();
        $task = $model->where('is_archived', 0)->find($id);

        if ($task === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = $this->taskData();

        if (! $this->validateData($data, [
            'title' => 'required',
            'task_date' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, $data);

        return redirect()->to(site_url('tasks'))->with('message', 'Task updated successfully.');
    }

    public function archive(int $id)
    {
        $model = new TaskModel();
        $task = $model->where('is_archived', 0)->find($id);

        if ($task === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $model->update($id, ['is_archived' => 1]);

        return redirect()->to(site_url('tasks'))->with('message', 'Task archived successfully.');
    }

    private function taskData(): array
    {
        return [
            'title' => trim((string) $this->request->getPost('title')),
            'status' => trim((string) $this->request->getPost('status')) ?: 'Pending',
            'task_date' => (string) $this->request->getPost('task_date'),
        ];
    }
}
