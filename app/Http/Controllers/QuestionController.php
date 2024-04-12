<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Question::all();
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
        $question_text = $request->input('question');
        $option_1 = $request->input('option_1');
        $option_2 = $request->input('option_2');
        $option_3 = $request->input('option_3');
        $option_4 = $request->input('option_4');
        $option_5 = $request->input('option_5');
        $answer = $request->input('answer');

        $question = Question::create([  
            'exams_id' => $exams_id,
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
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $exams_id = $request->input('exams_id');
        $question_text = $request->input('question');
        $option_1 = $request->input('option_1');
        $option_2 = $request->input('option_2');
        $option_3 = $request->input('option_3');
        $option_4 = $request->input('option_4');
        $option_5 = $request->input('option_5');
        $answer = $request->input('answer');

        $question->update([  
            'exams_id' => $exams_id,
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
