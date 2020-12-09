<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class CourseEnrollmentController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @param  \App\student  $student
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data['enrollments'] = Enrollment::join('students', 'students.id', '=', 'enrollments.student_id')
        ->Where('enrollments.course_id', '=', 3)
        ->get(['enrollments.id', 
                'enrollments.course_id', 
                'students.first_name',
                'students.last_name']);

        return view('coursesenrollment.index', $data);
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\student  $student
    * @return \Illuminate\Http\Response
    */
    public function show(Request $request, $id)
    {
        $data['enrollments'] = Enrollment::join('students', 'students.id', '=', 'enrollments.student_id')
        ->Where('enrollments.course_id', '=', $id)
        ->get(['enrollments.id', 
                'enrollments.course_id', 
                'students.first_name',
                'students.last_name']);

        return view('coursesenrollment.index', $data);
    }

}
