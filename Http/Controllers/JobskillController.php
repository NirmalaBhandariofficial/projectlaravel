<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Jobskill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobskillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('employer.job.skill.index', [
            'skills' => Jobskill::where('job_id', $id)->get(),
            'job' => Job::where('id', $id)->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required|regex:/^(?=.*[A-Za-z])[A-Za-z0-9\s]*$/',
        ]);
    
        if ($validator->fails()) {
            // Validation failed, return an appropriate response
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Jobskill::create([
            'title' => $request->title,
            'job_id' => $request->job_id,
        ]);

        return redirect(route('job.skill', $request->job_id));
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
        $skill = Jobskill::where('id', $id)->first();
        return view('employer.job.skill.edit', [
            'job' => Job::where('id', $skill['job_id'])->first(),
            'skill' => $skill,
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
            'title' => 'required|regex:/^(?=.*[A-Za-z])[A-Za-z0-9\s]*$/',
        ]);
    
        if ($validator->fails()) {
            // Validation failed, return an appropriate response
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Jobskill::where('id', $id)->update([
            'title' => $request->title,
        ]);

        return redirect(route('job.skill', $request->job_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Jobskill::where('id', $id)->first();
        Jobskill::destroy($id);
        return redirect(route('job.skill', $skill['job_id']));
    }
}
