<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'project_id'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
