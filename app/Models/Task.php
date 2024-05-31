<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'completed',
        'priority',
        'due_date',
        'reminder',
    ];

public function subtasks()
{
    return $this->hasMany(Subtask::class);
}
}

