<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['title', 'status', 'task_date', 'is_archived', 'created_at'];

    public function getTodayTasks()
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->where('is_archived', 0)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getAllTasksOrdered()
    {
        return $this->where('is_archived', 0)
                    ->orderBy('task_date', 'ASC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}