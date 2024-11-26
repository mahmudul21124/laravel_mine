<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$items = Teacher::all();
        $items = Teacher::orderBy('id', 'desc')->get();
        return view('backend.teacher.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designations = Designation::all();
        return view('backend.teacher.create', compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required | max:100 | min:5',
                'designation' => 'required',
                'email' => 'required | email | max:50',
                'password' => 'required | min:8 | confirmed',
                'photo' => 'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
                'status' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'phone' => 'required'
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath.$postImage;
        }
        else{
            $photo = 'images/nophoto.jpg';
        }


        $teacher = new Teacher();

        $teacher->name = $request->name;
        $teacher->designation_id = $request->designation;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        $teacher->dob = $request->dob;
        $teacher->gender = $request->gender;
        $teacher->address = $request->address;
        $teacher->phone = $request->phone;
        $teacher->photo = $photo;
        $teacher->status = $request->status;

        $teacher->save();

        return redirect()->route('teacher.index')->with('msg', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('backend.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $designations = Designation::all();
        $teacher = Teacher::find($id);
        
        return view('backend.teacher.edit', compact('teacher', 'designations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate(
            [
                'name' => 'required | max:100 | min:5',
                'designation' => 'required',
                'email' => 'required | email | max:50',
                'photo' => 'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
                'status' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'phone' => 'required'
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath.$postImage;
        }
        else{
            $photo = $teacher->photo;
        }

        $teacher->name = $request->name;
        $teacher->designation_id = $request->designation;
        $teacher->email = $request->email;
        $teacher->password = $teacher->password;
        $teacher->dob = $request->dob;
        $teacher->gender = $request->gender;
        $teacher->address = $request->address;
        $teacher->phone = $request->phone;
        $teacher->photo = $photo;
        $teacher->status = $request->status;

        $teacher->update();
        return redirect()->route('teacher.index')->with('upt', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index')->with('dlt', 'Successfully Deleted');
    }
}
