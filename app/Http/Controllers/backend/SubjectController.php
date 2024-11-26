<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$items = Subject::all();
        $items = Subject::orderBy('id', 'desc')->get();
        return view('backend.subject.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'subject' => 'required | min:3 | max:50',

            ]
        );
        $subject = new Subject();

        $subject->name = $request->subject;

        $subject->save();

        return redirect()->route('subject.index')->with('msg', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //dd($subject);
        return view('backend.subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('backend.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate(
            [
                'subject' => 'required | min:3 | max:50',

            ]
        );
        
        $subject->name = $request->subject;

        $subject->update();
        return redirect()->route('subject.index')->with('upt', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index')->with('dlt', 'Successfully Deleted');
    }
}
