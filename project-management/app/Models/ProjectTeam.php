<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectTeam extends Model
{
    use HasFactory;

    protected $table = 'project_team';
    public $timestamps = false;

    protected $fillable = [
        'project_id',
        'user_id',
        'joined_at'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
