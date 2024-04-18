<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonAdminController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new lesson.
     */
    public function create()
    {
        return view('lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
          ]);
        Lesson::create($request->all());
        return redirect()->route('lessons.index')
            ->with('success','Lesson created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lesson = Lesson::find($id);
        return view('lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified lesson.
     */
    public function edit($id)
    {
       $lesson = Lesson::find($id);
       return view('lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
          ]);
        $lesson = Lesson::find($id);
        $lesson->update($request->all());
        return redirect()->route('lessons.index')
            ->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->route('lessons.index')
            ->with('success', 'Lesson deleted successfully');
    }
}
