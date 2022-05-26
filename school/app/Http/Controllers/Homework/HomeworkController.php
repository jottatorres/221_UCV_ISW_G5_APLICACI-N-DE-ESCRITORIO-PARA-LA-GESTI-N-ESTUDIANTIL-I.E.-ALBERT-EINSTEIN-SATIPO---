<?php

namespace App\Http\Controllers\Homework;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index(){
        return view('admin.homework.index');
    }
}
