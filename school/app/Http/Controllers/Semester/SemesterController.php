<?php

namespace App\Http\Controllers\Semester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index(){
        return view('admin.semester.index');
    }
}
