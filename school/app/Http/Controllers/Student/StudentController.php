<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('admin.student.index');
    }

    public function attendance(){
        return view('admin.student.attendance');
    }

    public function notes(){
        return view('admin.student.notes');
    }

    public function homeworks(){
        return view('admin.student.homework');
    }
}
