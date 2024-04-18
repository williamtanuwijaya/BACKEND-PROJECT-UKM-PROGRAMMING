<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Resources\ExamResource;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $classroom_id, String $student_id)
    {
        $exams = Exam::where('classroom_id', $classroom_id)->get();
        $currentTime = Carbon::now()->addHours(7);
        
        for ($i = 0; $i < count($exams); $i++) {
            $grades = Grade::where('student_id', $student_id)->where('exam_id', $exams[$i]->id)->first();
            if ($exams[$i]->start_time <= $currentTime && $exams[$i]->end_time >= $currentTime) {
                if ($grades) {
                    unset($exams[$i]);
                }
            }
            else {
                unset($exams[$i]);
            }
        }
        
        return response()->json(['exams' => $exams->values()], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $lessons_id = $request->input('lesson_id');
        $classroom_id = $request->input('classroom_id');
        $duration = $request->input('duration');
        $description = $request->input('description');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $random_question = $request->input('random_question');
        $random_answer = $request->input('random_answer');
        $show_answer = $request->input('show_answer');
    
        $exam = Exam::create([  
            'title' => $title,
            'lesson_id' => $lessons_id,
            'classroom_id' => $classroom_id,
            'duration' => $duration,
            'description' => $description,
            'start_time' => $start_time,
            'end_time' => $end_time,
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        $title = $request->input('title');
        $lesson_id = $request->input('lesson_id');
        $classroom_id = $request->input('classroom_id');
        $duration = $request->input('duration');
        $description = $request->input('description');
        $random_question = $request->input('random_question');
        $random_answer = $request->input('random_answer');
        $show_answer = $request->input('show_answer');

        $exam->update([  
            'title' => $title,
            'lesson_id' => $lesson_id,
            'classroom_id' => $classroom_id,
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

    public function kumpulUjian(Request $request) {
        $jsonData = $request->json()->all();

        $grade = new Grade();

        $grade->student_id = $jsonData['student_id'];
        $grade->exam_id = $jsonData['exam_id'];
        $grade->duration = $jsonData['duration'];
        $grade->start_time = $jsonData['start_time'];
        $grade->end_time = $jsonData['end_time'];

        $questions = Question::where('exam_id', $jsonData['exam_id'])->get();

        $totalCorrect = 0;

        foreach ($questions as $question) {
            $correctAnswer = "";

            if ($question->answer == 1) {
                $correctAnswer = $question->option_1;
            }
            else if ($question->answer == 2) {
                $correctAnswer = $question->option_2;
            }
            else if ($question->answer == 3) {
                $correctAnswer = $question->option_3;
            }
            else if ($question->answer == 4) {
                $correctAnswer = $question->option_4;
            }
            else if ($question->answer == 5) {
                $correctAnswer = $question->option_5;
            }

            if ($correctAnswer == $jsonData['answers'][$question->id . $jsonData['student_id']]) {
                $totalCorrect++;
            }
        }
        $grade->total_correct = $totalCorrect;

        $grade->grade = $totalCorrect / count($questions) * 100;

        $grade->save();

        return response()->json(['grade' => $grade], 200);
    }
}
