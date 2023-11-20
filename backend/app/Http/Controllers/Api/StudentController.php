<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function createStudent(Request $request)
    {
        try{
            $customMessage = [
                "name.required" => "Fullname is required",
                "name.min" => "Please use your fullname",
                "course.required" => "Please fill up the course field",
                "email.required" => "Your email is required",
                "email.email" => "Please use a valid email",
                "phone.required" => "Please enter you phone number",
                "phone.min" => "Please use valid phone number",
                "phone.max" => "Please use valid phone number",
            ];
            
            $validatedData = $request->validate([
                "name" => "required|min:3",
                "course" => "required",
                "email" => "required|email",
                "phone" => "required|min:11|max:11",
            ], $customMessage);

            $student = new Student;
            $student->name = $request->name;
            $student->course = $request->course;
            $student->email = $request->email;
            $student->phone = $request->phone;

            $student->save();
        }catch(err){
            return response()->json(err);
        }
    }

    public function getStudents()
    {
        $students = Student::all();
        return response()->json($students);
    }
}
