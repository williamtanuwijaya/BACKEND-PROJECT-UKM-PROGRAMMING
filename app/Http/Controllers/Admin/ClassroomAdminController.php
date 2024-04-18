<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomAdminController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new classroom.
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
          ]);
        Classroom::create($request->all());
        return redirect()->route('classrooms.index')
            ->with('success','Classroom created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classroom = Classroom::find($id);
        return view('classrooms.show', compact('classroom'));
    }

    /**
     * Show the form for editing the specified classroom.
     */
    public function edit($id)
    {
       $classroom = Classroom::find($id);
       return view('classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
          ]);
        $classroom = Classroom::find($id);
        $classroom->update($request->all());
        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classroom = Classroom::find($id);
        $classroom->delete();
        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom deleted successfully');
    }
}
