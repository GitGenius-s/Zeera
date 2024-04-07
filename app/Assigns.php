<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assigns extends Model
{
    use SoftDeletes;
    protected $guarded=[];
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'task_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
