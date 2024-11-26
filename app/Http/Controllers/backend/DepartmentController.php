<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$items = Department::all();
        $items = Department::orderBy('id', 'desc')->get();
        return view('backend.department.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'department' => 'required | min:3 | max:50',

            ]
        );
        $department = new Department();

        $department->name = $request->department;

        $department->save();

        return redirect()->route('department.index')->with('msg', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //dd($specialist);
        return view('backend.department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('backend.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate(
            [
                'department' => 'required | min:3 | max:50',

            ]
        );
        
        $department->name = $request->department;

        $department->update();
        return redirect()->route('department.index')->with('upt', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('dlt', 'Successfully Deleted');
    }
}
