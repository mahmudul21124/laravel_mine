<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$items = Designation::all();
        $items = Designation::orderBy('id', 'desc')->get();
        return view('backend.designation.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.designation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'designation' => 'required',
            'details' => 'required | max:150'
            
        ]
    );
        $designation = new Designation();
        
        $designation->name = $request->designation;
        $designation->details = $request->details;

        $designation->save();

        return redirect()->route('designation.index')->with('msg', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        //dd($specialist);
        return view('backend.designation.show', compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        return view('backend.designation.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation)
    {
        $designation->name = $request->designation;
        $designation->details = $request->details;

        $designation->update();
        return redirect()->route('designation.index')->with('upt', 'Successfully Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        return redirect()->route('designation.index')->with('dlt', 'Successfully Deleted');
    }
}
