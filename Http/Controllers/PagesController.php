<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function job(){
        return view('employee.job.index', [
            'jobs' => Job::get(),
        ]);
    }
    public function jobview($id){
        return view('employee.job.view', [
            'job' => Job::where('id', $id)->first(),
        ]);
    }
    public function jobview1($id){
        return view('employee.recommend.view', [
            'jobview' => Job::where('id', $id)->first(),
        ]);
    }

    public function application(Request $request){
        Application::create([
            'job_id' => $request->job_id,
            'user_id' => Auth::user()->id,
            'status' => "pending",
            'view' => 0,
        ]);

        return redirect()->back()->with('success', 'Successfully Submitted.');
    }

    public function search(Request $request){
        return view('employee.job.index', [
            'jobs' => Job::where('title','LIKE','%'.$request->query->get('query').'%')->get(),
        ]);
    }

    public function applicationlist($id){

        $applications = Application::where('job_id', $id)->where('status', 'pending')->get();

        return view('employer.job.application.index', [
            'job' => Job::where('id', $id)->first(),
            'applications' => $applications,
        ]);
    }
    public function readapplicationlist($id){

        $applications = Application::where('job_id', $id)->where('status', 'read')->get();

        return view('employer.job.application.read', [
            'job' => Job::where('id', $id)->first(),
            'applications' => $applications,
        ]);
    }

    public function applicationupdate($id){
        Application::where('id', $id)->update([
            'status' => 'read',
        ]);

        return redirect()->back();
    }
}
