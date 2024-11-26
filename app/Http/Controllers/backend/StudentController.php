<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$items = Student::all();
        $items = Student::orderBy('id', 'desc')->get();
        return view('backend.student.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        return view('backend.student.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required | max:100 | min:5',
                'classroom' => 'required',
                'email' => 'required | email | max:50',
                'password' => 'required | min:8 | confirmed',
                'photo' => 'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
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
            $photo = $destinationPath . $postImage;
        } else {
            $photo = 'images/nophoto.jpg';
        }


        $student = new Student();

        $student->name = $request->name;
        $student->classroom_id = $request->classroom;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->photo = $photo;

        $student->save();

        return redirect()->route('student.index')->with('msg', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('backend.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classrooms = Classroom::all();
        $student = Student::find($id);
        
        return view('backend.student.edit', compact('student', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate(
            [
                'name' => 'required | max:100 | min:5',
                'classroom' => 'required',
                'email' => 'required | email | max:50',
                'photo' => 'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
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
            $photo = $student->photo;
        }

        $student->name = $request->name;
        $student->classroom_id = $request->classroom;
        $student->email = $request->email;
        $student->password = $student->password;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->photo = $photo;

        $student->update();
        return redirect()->route('student.index')->with('upt', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('dlt', 'Successfully Deleted');
    }
}
