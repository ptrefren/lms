<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data['students'] = Student::orderBy('id','desc')->paginate(5);
        return view('students.index', $data);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('students.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //$request->validate([
        //    'first_name' => 'required',
        //    'last_name' => 'required',
        //    'matriculation_date' => 'required',
        //    'enrolled' => 'required'
        //]);
        $student = new Student;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->matriculation_date = $request->matriculation_date;
        $student->enrolled = $request->enrolled ? true : false;
        $student->save();
        return redirect()->route('students.index')
        ->with('success','Student has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\student  $student
    * @return \Illuminate\Http\Response
    */
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\student  $student
    * @return \Illuminate\Http\Response
    */
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\student  $student
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'matriculation_date' => 'required',
        ]);
        $student = Student::find($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->matriculation_date = $request->matriculation_date;
        $student->enrolled = $request->enrolled ? true : false;
        $student->save();
        return redirect()->route('students.index')
        ->with('success','Student Has Been updated successfully');
    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Student  $student
    * @return \Illuminate\Http\Response
    */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
        ->with('success','student has been deleted successfully');
    }    //


}
