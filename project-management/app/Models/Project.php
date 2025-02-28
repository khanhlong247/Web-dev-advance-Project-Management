<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'description',
        'budget',
        'deadline',
        'created_by'
    ];

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function milestones() {
        return $this->hasMany(Milestone::class);
    }

    public function risks() {
        return $this->hasMany(Risk::class);
    }

    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function calendarEvents() {
        return $this->hasMany(CalendarEvent::class);
    }

    public function projectTeams() {
        return $this->hasMany(ProjectTeam::class);
    }

    public function activityLogs() {
        return $this->hasMany(ActivityLog::class);
    }
}
