<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('users.admin.teacher.index');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $teacher = User::create($request->validated());
        $teacher->attachRole('teacher');

        if($request->hasFile('avatar')){
            $avatar =  $teacher->id . '-'. $request->first_name . '-' . $request->last_name .'.' . $request->avatar->getClientOriginalExtension(); 
            $request->avatar->move(public_path('images/profile'), $avatar);
            $teacher->update(['avatar'=> $avatar]);
        }
        
        return redirect()->route('teacher.index')->with('message', 'Teacher Add successfully');
     

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(User $teacher)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        return view('users.admin.teacher.edit', compact('teacher'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $teacher)
    {
        
        $teacher->update($request->validated());
        if($request->hasFile('avatar')){
            $avatar =  $teacher->id . '-'. $request->first_name . '-' . $request->last_name .'.' . $request->avatar->getClientOriginalExtension(); 
            $request->avatar->move(public_path('images/profile'), $avatar);
            $teacher->update(['avatar'=> $avatar]);
        }
        return redirect()->route('teacher.index')->with('message', 'Teacher Profile Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index')->with('message', 'Teacher Profile Deleted successfully');
    }
}
