<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskbitController extends Controller
{
   public function index()
{
    return view('taskbits.index');
}

    public function create()
    {
        return "Create Taskbit Page";
    }

    public function store(Request $request)
    {
        return "Taskbit Saved";
    }
}
