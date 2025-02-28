<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_name'
    ];

    public function tasks() {
        return $this->belongsToMany(Task::class, 'task_tags', 'tag_id', 'task_id');
    }
}
