<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$items = Timetable::all();
        $items = Timetable::orderBy('id', 'desc')->get();
        return view('backend.timetable.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('backend.timetable.create', compact('teachers', 'classrooms', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'classroom' => 'required',
                'teacher' => 'required',
                'subject' => 'required',
                'day' => 'required',
                'startTime' => 'required',
                'endTime' => 'required'

            ]
        );
        $timetable = new Timetable();

        $timetable->classroom_id = $request->classroom;
        $timetable->teacher_id = $request->teacher;
        $timetable->subject_id = $request->subject;
        $timetable->day = $request->day;
        $timetable->startTime = $request->startTime;
        $timetable->endTime = $request->endTime;

        $timetable->save();

        return redirect()->route('timetable.index')->with('msg', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Timetable $timetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timetable $timetable)
    {
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('backend.timetable.edit', compact('teachers', 'classrooms', 'subjects' , 'timetable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Timetable $timetable)
    {
        $request->validate(
            [
                'classroom' => 'required',
                'teacher' => 'required',
                'subject' => 'required',
                'day' => 'required',
                'startTime' => 'required',
                'endTime' => 'required'

            ]
        );

        $timetable->classroom_id = $request->classroom;
        $timetable->teacher_id = $request->teacher;
        $timetable->subject_id = $request->subject;
        $timetable->day = $request->day;
        $timetable->startTime = $request->startTime;
        $timetable->endTime = $request->endTime;

        $timetable->update();

        return redirect()->route('timetable.index')->with('upt', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timetable $timetable)
    {
        $timetable->delete();
        return redirect()->route('timetable.index')->with('dlt', 'Successfully Deleted');
    }
}
