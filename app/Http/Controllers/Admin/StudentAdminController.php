<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentAdminController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required',
            'nisn' => 'required',
            'name' => 'required',
            'password' => 'required',
            'gender' => 'required',
          ]);

        $classroom_id = $request->input('classroom_id');
        $student_nisn = $request->input('nisn');
        $student_name = $request->input('name');
        $student_password = $request->input('password');
        $student_gender = $request->input('gender');

        Student::create([
            'classroom_id' => $classroom_id,
            'nisn' => $student_nisn,
            'name' => $student_name,
            'password' => Hash::make($student_password),
            'gender' => $student_gender,
        ]);
        return redirect()->route('students.index')
            ->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit($id)
    {
       $student = Student::find($id);
       return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'classroom_id' => 'required',
            'nisn' => 'required',
            'name' => 'required',
            'password' => 'required',
            'gender' => 'required',
          ]);
        $student = Student::find($id);
        $student->update($request->all());
        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully');
    }
}
