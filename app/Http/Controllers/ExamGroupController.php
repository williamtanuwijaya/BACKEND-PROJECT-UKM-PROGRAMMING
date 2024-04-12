<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExamGroupResource;
use App\Models\ExamGroup;
use Illuminate\Http\Request;

class ExamGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ExamGroup::all();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamGroup $examGroup)
    {
        return new ExamGroupResource($examGroup);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamGroup $examGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamGroup $examGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamGroup $examGroup)
    {
        $examGroup->delete();
        return response()->json(null,204);
    }
}
