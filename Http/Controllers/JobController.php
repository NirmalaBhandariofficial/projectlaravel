<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employer.job.index', [
            'jobs' => Job::where('employer_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employer.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|regex:/^[A-Za-z0-9\s]+$/',
            'experience' => 'required',
            'description' => 'required',
            'job_type' => 'required',
            'education_level' => 'required',
            'salary' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            // Validation failed, return an appropriate response
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Job::create([
            'title' => $request->title,
            'experience' => $request->experience,
            'description' => $request->description,
            'job_type' => $request->job_type,
            'education_level' => $request->education_level,
            'salary' => $request->salary,
            'employer_id' => Auth::user()->id,
        ]);

        return redirect(route('job.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employer.job.edit', [
            'job' => Job::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|regex:/^[A-Za-z0-9\s]+$/',
            'experience' => 'required',
            'description' => 'required',
            'job_type' => 'required',
            'education_level' => 'required',
            'salary' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            // Validation failed, return an appropriate response
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        Job::where('id', $id)->update([
            'title' => $request->title,
            'experience' => $request->experience,
            'description' => $request->description,
            'job_type' => $request->job_type,
            'education_level' => $request->education_level,
            'salary' => $request->salary,
        ]);

        return redirect(route('job.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::destroy($id);

        return redirect(route('job.index'));
    }
}
