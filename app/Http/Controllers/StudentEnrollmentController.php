<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentEnrollment;
use App\Models\Enrollment;
use App\Models\Course;


use Illuminate\Http\Request;

class StudentEnrollmentController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @param  \App\student  $student
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $enrollments = Enrollment::join('courses', 'courses.id', '=', 'enrollments.course_id')
        ->Where('enrollments.student_id', '=', 2)
        ->get(['enrollments.id', 
                'enrollments.course_id', 
                'courses.course_name']);

        return view('studentsenrollment.show', compact($enrollments));
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\student  $student
    * @return \Illuminate\Http\Response
    */
    public function show(Request $request, $id)
    {

        $student_id = $id;
        // $data['enrollments'] = Enrollment::join('courses', 'courses.id', '=', 'enrollments.course_id')
        $enrollments = Enrollment::join('courses', 'courses.id', '=', 'enrollments.course_id')
        ->Where('enrollments.student_id', '=', $student_id)
        ->get(['enrollments.id', 
                'enrollments.course_id', 
                'courses.course_name']);


        return view('studentsenrollment.show', compact('student_id', 'enrollments'));
    }

    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Enrollment $enrollment)
    {
        
        $enrollment = new Enrollment;
        $enrollment->student_id = $id;
        $enrollment->course_id = $request->course_id;
        $enrollment->save();
        return redirect()->route('studentsenrollment.show', $request->student_id);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Student  $student
    * @return \Illuminate\Http\Response
    */
    public function destroy($enrollment_id, $student_id)
    {
        $enrollment = Enrollment::Select('*')->Where('enrollments.id', '=', $enrollment_id);
        $enrollment->delete();
        return redirect()->route('studentsenrollment.show', $student_id)
        ->with('success','student has been deleted successfully');

    }    //

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\student  $student
    * @return \Illuminate\Http\Response
    */
    public function edit(Request $request, $id)
    {
        $student_id = $id;
        $courses = Course::orderBy('course_name')->get();

        return view('studentsenrollment.edit',compact('student_id', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $student_id = $id;
        $enrollment = new Enrollment;
        $enrollment->student_id = $student_id;
        $enrollment->course_id = $request->course_id;
        $enrollment->save();
        return redirect()->route('studentsenrollment.show', $student_id);

    }
 


}
