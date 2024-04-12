<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExamResource;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Exam::all();
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
        $title = $request->input('title');
        $lessons_id = $request->input('lessons_id');
        $classroom_id = $request->input('classrooms_id');
        $duration = $request->input('duration');
        $description = $request->input('description');
        $random_question = $request->input('random_question');
        $random_answer = $request->input('random_answer');
        $show_answer = $request->input('show_answer');
    
        $exam = Exam::create([  
            'title' => $title,
            'lessons_id' => $lessons_id,
            'classrooms_id' => $classroom_id,
            'duration' => $duration,
            'description' => $description,
            'random_question' => $random_question,
            'random_answer' => $random_answer,
            'show_answer' => $show_answer,
           
        ]);

        return response()->json([
            'data' => new ExamResource($exam),
        ], 201 );

    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        return new ExamResource($exam);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        $title = $request->input('title');
        $lessons_id = $request->input('lessons_id');
        $classroom_id = $request->input('classrooms_id');
        $duration = $request->input('duration');
        $description = $request->input('description');
        $random_question = $request->input('random_question');
        $random_answer = $request->input('random_answer');
        $show_answer = $request->input('show_answer');

        $exam->update([  
            'title' => $title,
            'lessons_id' => $lessons_id,
            'classrooms_id' => $classroom_id,
            'duration' => $duration,
            'description' => $description,
            'random_question' => $random_question,
            'random_answer' => $random_answer,
            'show_answer' => $show_answer,
        ]);

        return response()->json([
            'data' => new ExamResource($exam),
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return response()->json(null,204);
    }
}
