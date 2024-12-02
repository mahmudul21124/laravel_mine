<?php

namespace App\Http\Controllers\Auth\Student;

use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function create(): View
    {
        $classrooms = Classroom::all();
        return view('login.student_register', compact('classrooms'));
    }

    public function store(Request $request): RedirectResponse
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

        Auth::guard('student')->login($student);

        return redirect(RouteServiceProvider::STUDENT_DASHBOARD);
    }
}
