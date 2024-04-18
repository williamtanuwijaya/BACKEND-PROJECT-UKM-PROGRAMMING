<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Lesson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\GradeResource;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jsonData = $request->json()->all();

        $classroom = Classroom::find($jsonData['classroom_id']);
        $lesson = Lesson::find($jsonData['lesson_id']);

        return response()->json(['classroom' => $classroom->title, 'lesson' => $lesson->title], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exam_id = $request->input('exam_id');
        $student_id = $request->input('student_id');
        $duration = $request->input('duration');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $total_correct = $request->input('total_correct');
        $grade = $request->input('grade');

        $grade = Grade::create([  
            'exam_id' => $exam_id,
            'student_id' => $student_id,
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        $exam_id = $request->input('exam_id');
        $student_id = $request->input('student_id');
        $duration = $request->input('duration');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $total_correct = $request->input('total_correct');
        $grade_score = $request->input('grade');

        $grade->update([  
            'exam_id' => $exam_id,
            'student_id' => $student_id,
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
