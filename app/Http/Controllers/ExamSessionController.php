<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExamSessionResource;
use App\Models\ExamSession;
use Illuminate\Http\Request;

class ExamSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ExamSession::all();
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
        $exams_id = $request->input('exams_id');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        $examSession = ExamSession::create([  
            'title' => $title,
            'exams_id' => $exams_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        return response()->json([
            'data' => new ExamSessionResource($examSession),
        ], 201 );

    }

    /**
     * Display the specified resource.
     */
    public function show(ExamSession $examSession)
    {
        return new ExamSessionResource($examSession);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamSession $examSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamSession $examSession)
    {
        $title = $request->input('title');
        $exams_id = $request->input('exams_id');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        $examSession->update([  
            'title' => $title,
            'exams_id' => $exams_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        return response()->json([
            'data' => new ExamSessionResource($examSession),
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamSession $examSession)
    {
        $examSession->delete();
        return response()->json(null,204);
    }
}
