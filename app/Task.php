<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'parent_id', // Add parent_id to the fillable array
        'task_name',
        'description',
        'priority',
        'created_date',
        'due_date',
        'taskCreatedBy',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function assigns()
    {
        return $this->hasMany(Assigns::class, 'task_id', 'task_id');
    }
    public function subtasks()
    {
        return $this->hasMany(Task::class, 'parent_id', 'task_id');
    }
}
