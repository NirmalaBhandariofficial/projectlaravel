<?php

namespace App\Http\Controllers;

use App\Models\Userexperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'title' => 'required',
            'position' => 'required',
            'type' => 'required',
            'start_date' => 'required',
            'experience' => 'required',
        ]);
    
        if ($validator->fails()) {
            // Validation failed, return an appropriate response
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Userexperience::create([
            'title' => $request->title,
            'position' => $request->position,
            'employment_type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'experience' => $request->experience,
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('employee.account','#tab3'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Userexperience::destroy($id);

        return redirect(route('employee.account','#tab3'));
    }
}
