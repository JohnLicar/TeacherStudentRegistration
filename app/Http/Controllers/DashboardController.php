<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()

    {

        if (Auth::user()->isAn('admin')) return view('users.admin.dashboard')->with([
            'teacher' => User::whereRoleIs('teacher')->count(),
            'student' => User::whereRoleIs('student')->count(),
            'course' => Course::count(),
        ]);

        if (Auth::user()->isAn('teacher')) return view('users.teacher.dashboard');

        if (Auth::user()->isAn('student')) return view('users.student.dashboard');

        if (Auth::user()) return view('auth.login');
    }

    public function profile()
    {
    }
}
