<?php

namespace App\Http\Controllers;

use App\Http\Resources\GradeResource;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Grade::all();
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
        $exams_id = $request->input('exams_id');
        $exam_sessions_id = $request->input('exam_sessions_id');
        $students_id = $request->input('students_id');
        $duration = $request->input('duration');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $total_correct = $request->input('total_correct');
        $grade = $request->input('grade');

        $grade = Grade::create([  
            'exams_id' => $exams_id,
            'exam_sessions_id' => $exam_sessions_id,
            'students_id' => $students_id,
            'duration' => $duration,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'total_correct' => $total_correct,
            'grade' => $grade,
        ]);

        return response()->json([
            'data' => new GradeResource($grade),
        ], 201 );

    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        return new GradeResource($grade);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        $exams_id = $request->input('exams_id');
        $exam_sessions_id = $request->input('exam_sessions_id');
        $students_id = $request->input('students_id');
        $duration = $request->input('duration');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $total_correct = $request->input('total_correct');
        $grade_score = $request->input('grade');

        $grade->update([  
            'exams_id' => $exams_id,
            'exam_sessions_id' => $exam_sessions_id,
            'students_id' => $students_id,
            'duration' => $duration,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'total_correct' => $total_correct,
            'grade' => $grade_score,
        ]);

        return response()->json([
            'data' => new GradeResource($grade),
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return response()->json(null,204);
    }
}
