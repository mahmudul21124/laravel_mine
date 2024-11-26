<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$items = Classroom::all();
        $items = Classroom::orderBy('id', 'desc')->get();
        return view('backend.classroom.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('backend.classroom.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'classroom' => 'required | min:3 | max:50',
                'teacher' => 'required'

            ]
        );
        $classroom = new Classroom();

        $classroom->name = $request->classroom;
        $classroom->teacher_id = $request->teacher;

        $classroom->save();

        return redirect()->route('classroom.index')->with('msg', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        $teachers = Teacher::all();
        return view('backend.classroom.edit', compact('classroom', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate(
            [
                'classroom' => 'required | min:3 | max:50',
                'teacher' => 'required'

            ]
        );

        $classroom->name = $request->classroom;
        $classroom->teacher_id = $request->teacher;

        $classroom->update();

        return redirect()->route('classroom.index')->with('upt', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classroom.index')->with('dlt', 'Successfully Deleted');
    }
}
