<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    protected $taskModel;
    protected $userModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => "Tasks for Today",
            'tasks' => $this->taskModel->getTodayTasks(),
        ];
        return view('tasks/today', $data);
    }

    public function allTasks()
    {
        $data = [
            'title' => "Complete Task List",
            'tasks' => $this->taskModel->getAllTasksOrdered(),
        ];
        return view('tasks/all', $data);
    }

    public function profile()
    {
        $data = [
            'title' => "User Profile",
            'user'  => $this->userModel->getDemoUser(),
        ];
        return view('profile', $data);
    }

    public function about()
    {
        $data = [
            'title'     => "About Developer",
            'developer' => [
                'name'    => 'Student Name / Group',
                'section' => 'Section Code',
                'course'  => 'IT0049 - Web System Technologies',
            ]
        ];
        return view('about', $data);
    }

    public function new()
    {
        return view('tasks/new', ['title' => 'Add New Task']);
    }

    public function create()
    {
        $rules = [
            'title'     => 'required|min_length[3]|max_length[150]',
            'task_date' => 'required|valid_date',
            'status'    => 'required|in_list[pending,completed]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->taskModel->save([
            'title'       => $this->request->getPost('title'),
            'status'      => $this->request->getPost('status'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0,
            'created_at'  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task added successfully!');
    }

    public function edit($id = null)
    {
        $task = $this->taskModel->find($id);
        if (!$task || $task['is_archived'] == 1) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        return view('tasks/edit', [
            'title' => 'Edit Task',
            'task'  => $task,
        ]);
    }

    public function update($id = null)
    {
        $task = $this->taskModel->find($id);
        if (!$task) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        $rules = [
            'title'     => 'required|min_length[3]|max_length[150]',
            'task_date' => 'required|valid_date',
            'status'    => 'required|in_list[pending,completed]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated successfully!');
    }

    public function delete($id = null)
    {
        $task = $this->taskModel->find($id);
        if ($task) {
            $this->taskModel->update($id, ['is_archived' => 1]);
            return redirect()->to('/tasks')->with('success', 'Task archived successfully.');
        }
        return redirect()->to('/tasks')->with('error', 'Task not found.');
    }
}