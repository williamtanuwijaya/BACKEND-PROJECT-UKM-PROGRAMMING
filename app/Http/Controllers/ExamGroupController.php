<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExamGroupResource;
use App\Models\ExamGroup;
use Illuminate\Http\Request;

class ExamGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ExamGroup::all();
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

        $examGroup = ExamGroup::create([  
            'exams_id' => $exams_id,
            'exam_sessions_id' => $exam_sessions_id,
            'students_id' => $students_id,
        ]);

        return response()->json([
            'data' => new ExamGroupResource($examGroup),
        ], 201 );

    }

    /**
     * Display the specified resource.
     */
    public function show(ExamGroup $examGroup)
    {
        return new ExamGroupResource($examGroup);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamGroup $examGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamGroup $examGroup)
    {
        $exams_id = $request->input('exams_id');
        $exam_sessions_id = $request->input('exam_sessions_id');
        $students_id = $request->input('students_id');

        $examGroup->update([  
            'exams_id' => $exams_id,
            'exam_sessions_id' => $exam_sessions_id,
            'students_id' => $students_id,
        ]);

        return response()->json([
            'data' => new ExamGroupResource($examGroup),
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamGroup $examGroup)
    {
        $examGroup->delete();
        return response()->json(null,204);
    }
}
