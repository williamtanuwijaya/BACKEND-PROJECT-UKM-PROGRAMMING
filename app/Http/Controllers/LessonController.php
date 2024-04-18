<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\LessonResource;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Lesson::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lesson_title = $request->input('title');

        $lesson = Lesson::create([
            'title' => $lesson_title,
        ]);

        return response()->json([
            'data' => new LessonResource($lesson)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return new LessonResource($lesson);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lesson_title = $request->input('title');

        $lesson->update([
            'title' => $lesson_title,
        ]);

        return response()->json([
            'data' => new LessonResource($lesson)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return response()->json(null,204);
    }

    public function getLessonTitle(String $lesson_id)
    {
        $lesson = Lesson::where('id', $lesson_id)->first();
        return response()->json(['lesson_name' => $lesson->title], 200);
    }
}
