<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function index(){
        return view('employer.index', [
            
        ]);
    }

    public function account(){
        return view('employer.account.index', [
            
        ]);
    }
}
