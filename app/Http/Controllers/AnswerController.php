<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Answer::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exams_id = $request->input('exams_id');
        $exam_sessions_id = $request->input('exam_sessions_id');
        $questions_id = $request->input('questions_id');
        $students_id = $request->input('students_id');
        $question_order = $request->input('question_order');
        $answer_order = $request->input('answer_order');
        $answer_column = $request->input('answer');
        $is_correct = $request->input('is_correct');

        $answer = Answer::create([  
            'exams_id' => $exams_id,
            'exam_sessions_id' => $exam_sessions_id,
            'questions_id' => $questions_id,
            'students_id' => $students_id,
            'question_order' => $question_order,
            'answer_order' => $answer_order,
            'answer' => $answer_column,
            'is_correct' => $is_correct,
        ]);

        return response()->json([
            'data' => new AnswerResource($answer),
        ], 201 );

    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        return new AnswerResource($answer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        $exams_id = $request->input('exams_id');
        $exam_sessions_id = $request->input('exam_sessions_id');
        $questions_id = $request->input('questions_id');
        $students_id = $request->input('students_id');
        $question_order = $request->input('question_order');
        $answer_order = $request->input('answer_order');
        $answer_column = $request->input('answer');
        $is_correct = $request->input('is_correct');

        $answer->update([  
            'exams_id' => $exams_id,
            'exam_sessions_id' => $exam_sessions_id,
            'questions_id' => $questions_id,
            'students_id' => $students_id,
            'question_order' => $question_order,
            'answer_order' => $answer_order,
            'answer' => $answer_column,
            'is_correct' => $is_correct,
        ]);

        return response()->json([
            'data' => new AnswerResource($answer),
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
        return response()->json(null,204);
    }
}
