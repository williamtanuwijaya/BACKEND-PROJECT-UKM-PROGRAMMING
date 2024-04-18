<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamAdminController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::all();
        return view('exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new exam.
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'lesson_id' => 'required',
            'classroom_id' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'random_question' => 'required',
            'random_answer' => 'required',
            'show_answer' => 'required',
          ]);

        Exam::create($request->all());
        return redirect()->route('exams.index')
            ->with('success','Exam created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exam = Exam::find($id);
        return view('exams.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified exam.
     */
    public function edit($id)
    {
       $exam = Exam::find($id);
       return view('exams.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'lesson_id' => 'required',
            'classroom_id' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'random_question' => 'required',
            'random_answer' => 'required',
            'show_answer' => 'required',
          ]);
          
        $exam = Exam::find($id);
        $exam->update($request->all());
        return redirect()->route('exams.index')
            ->with('success', 'Exam updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam = Exam::find($id);
        $exam->delete();
        return redirect()->route('exams.index')
            ->with('success', 'Exam deleted successfully');
    }
}
