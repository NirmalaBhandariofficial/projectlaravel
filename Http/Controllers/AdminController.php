<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Usereducation;
use App\Models\Userexperience;
use App\Models\Userskill;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userprofile($id){
        return view('employer.job.recommend.profile', [
            'user' => User::where('id', $id)->first(),
            'skills' => Userskill::where('user_id', $id)->get(),
            'educations' => Usereducation::where('user_id', $id)->get(),
            'experiences' => Userexperience::where('user_id', $id)->get(),
        ]);
    }

    public function index(){
        return view('admin.index', [
            'jobs' => Job::get(),
        ]);
    }

    public function removejob($id){
        Job::destroy($id);

        return redirect()->back();
    }
}
