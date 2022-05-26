<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index(){
        return view('admin.courses.index');
    }
}
