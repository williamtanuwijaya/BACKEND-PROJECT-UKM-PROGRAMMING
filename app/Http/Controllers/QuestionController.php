<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $exam_id)
    {
        $questions = Question::where('exam_id', $exam_id)->get();
        return response()->json(['questions' => $questions], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exam_id = $request->input('exam_id');
        $question_text = $request->input('question');
        $option_1 = $request->input('option_1');
        $option_2 = $request->input('option_2');
        $option_3 = $request->input('option_3');
        $option_4 = $request->input('option_4');
        $option_5 = $request->input('option_5');
        $answer = $request->input('answer');

        $question = Question::create([  
            'exam_id' => $exam_id,
            'question' => $question_text,
            'option_1' => $option_1,
            'option_2' => $option_2,
            'option_3' => $option_3,
            'option_4' => $option_4,
            'option_5' => $option_5,
            'answer' => $answer,
        ]);

        return response()->json([
            'data' => new QuestionResource($question),
        ], 201 );
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $exam_id = $request->input('exam_id');
        $question_text = $request->input('question');
        $option_1 = $request->input('option_1');
        $option_2 = $request->input('option_2');
        $option_3 = $request->input('option_3');
        $option_4 = $request->input('option_4');
        $option_5 = $request->input('option_5');
        $answer = $request->input('answer');

        $question->update([  
            'exam_id' => $exam_id,
            'question' => $question_text,
            'option_1' => $option_1,
            'option_2' => $option_2,
            'option_3' => $option_3,
            'option_4' => $option_4,
            'option_5' => $option_5,
            'answer' => $answer,
        ]);

        return response()->json([
            'data' => new QuestionResource($question),
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json(null,204);
    }
}
