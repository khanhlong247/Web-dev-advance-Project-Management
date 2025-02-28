<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $projects = Project::all();
        return view('admin.dashboard', compact('users', 'projects'));
    }
}
