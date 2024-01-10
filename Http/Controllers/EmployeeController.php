<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usereducation;
use App\Models\Userexperience;
use App\Models\Userinfo;
use App\Models\Userskill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.index', [
            'info' => Userinfo::where('user_id', Auth::user()->id)->first(),
            'user' => User::where('id', Auth::user()->id)->first(),
            'skills' => Userskill::where('user_id', Auth::user()->id)->get(),
            'educations' => Usereducation::where('user_id', Auth::user()->id)->get(),
            'experiences' => Userexperience::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    public function account(){
        return view('employee.account.index', [
            'skills' => Userskill::where('user_id', Auth::user()->id)->get(),
            'educations' => Usereducation::where('user_id', Auth::user()->id)->get(),
            'experiences' => Userexperience::where('user_id', Auth::user()->id)->get(),
        ]);
    }
}
