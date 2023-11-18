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
        Student::create($request->all());
        return response()->json("Student has been saved to database");
    }

    public function getStudents()
    {
        $students = Student::all();
        return response()->json($students);
    }
}
