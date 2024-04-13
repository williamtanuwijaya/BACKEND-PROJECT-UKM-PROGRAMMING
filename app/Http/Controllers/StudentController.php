<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classroom_id = $request->input('classrooms_id');
        $student_nisn = $request->input('nisn');
        $student_name = $request->input('name');
        $student_password = $request->input('password');
        $student_gender = $request->input('gender');

        $student = Student::create([
            'classrooms_id' => $classroom_id,
            'nisn' => $student_nisn,
            'name' => $student_name,
            'password' => $student_password,
            'gender' => $student_gender,
        ]);

        return response()->json([
            'data' => new StudentResource($student)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $classroom_id = $request->input('classrooms_id');
        $student_nisn = $request->input('nisn');
        $student_name = $request->input('name');
        $student_password = $request->input('password');
        $student_gender = $request->input('gender');

        $student->update([
            'classrooms_id' => $classroom_id,
            'nisn' => $student_nisn,
            'name' => $student_name,
            'password' => $student_password,
            'gender' => $student_gender,
        ]);

        return response()->json([
            'data' => new StudentResource($student)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(null,204);
    }
}