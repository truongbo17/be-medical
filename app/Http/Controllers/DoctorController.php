<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        return User::with('getMedicalDepartmentName')
        ->where('permission', 1)->get();
    }

    public function involve()
    {
        return User::where('permission', 1)
            ->where('medical_department', Auth::user()->medical_department)
            ->leftJoin('medical_departments', 'medical_departments.id', 'users.medical_department')
            ->take(3)->select('users.*', 'medical_departments.name as md_name')
            ->get();
    }
}
