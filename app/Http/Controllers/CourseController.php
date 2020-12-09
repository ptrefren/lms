<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data['courses'] = Course::orderBy('id','desc')->paginate(5);
        return view('courses.index', $data);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('courses.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'course_description' => 'required',
            'start_date' => 'required',
            'weeks' => 'required'
        ]);
        $course = new Course;
        $course->course_name = $request->course_name;
        $course->course_description = $request->course_description;
        $course->start_date = $request->start_date;
        $course->weeks = $request->weeks;
        $course->save();
        return redirect()->route('courses.index')
        ->with('success','Course has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\course  $course
    * @return \Illuminate\Http\Response
    */
    public function show(Course $course)
    {
        return view('courses.show',compact('course'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\course  $course
    * @return \Illuminate\Http\Response
    */
    public function edit(Course $course)
    {
        return view('courses.edit',compact('course'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\course  $course
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required',
            'course_description' => 'required',
            'start_date' => 'required',
            'weeks' => 'required'
        ]);
        $course = Course::find($id);
        $course->course_name = $request->course_name;
        $course->course_description = $request->course_description;
        $course->start_date = $request->start_date;
        $course->weeks = $request->weeks;
        $course->save();
        return redirect()->route('courses.index')
        ->with('success','Course has been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Course  $course
    * @return \Illuminate\Http\Response
    */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
        ->with('success','course has been deleted successfully');
    }    //

}
