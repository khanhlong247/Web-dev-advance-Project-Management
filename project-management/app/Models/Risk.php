<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Risk extends Model
{
    use HasFactory;

    protected $fillable = [
        'risk_name',
        'description',
        'response_plan',
        'project_id'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
