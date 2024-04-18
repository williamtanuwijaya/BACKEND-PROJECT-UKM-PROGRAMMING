<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Hash;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classroom_id = $request->input('classroom_id');
        $student_nisn = $request->input('nisn');
        $student_name = $request->input('name');
        $student_password = $request->input('password');
        $student_gender = $request->input('gender');

        $student = Student::create([
            'classroom_id' => $classroom_id,
            'nisn' => $student_nisn,
            'name' => $student_name,
            'password' => Hash::make($student_password),
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $classroom_id = $request->input('classroom_id');
        $student_nisn = $request->input('nisn');
        $student_name = $request->input('name');
        $student_password = $request->input('password');
        $student_gender = $request->input('gender');

        $student->update([
            'classroom_id' => $classroom_id,
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

    public function login(Request $request) {
        $request->validate([
           'nisn' => 'required',
           'password' => 'required',
        ]);

        $student = Student::where('nisn', $request->nisn)->first();
        if (!$student) {
            return response()->json(['message' => 'nisn tidak ditemukan'], 404);
        }
        else {
            if (Auth::attempt(['nisn' => $request->nisn, 'password' => $request->password])) {
                return response()->json(['message' => 'success', 'student' => Student::where('nisn', $request->nisn)->first()], 200);
            }
            else {
                return response()->json(['message' => 'password gagal'], 401);
            }
        }
    }
}
