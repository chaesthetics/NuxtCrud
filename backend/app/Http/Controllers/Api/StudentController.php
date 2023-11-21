<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
class StudentController extends Controller
{
    //
    public function createStudent(StudentRequest $request)
    {
        try{
            $student = new Student;
            $student->name = $request->name;
            $student->course = $request->course;
            $student->email = $request->email;
            $student->phone = $request->phone;

            $student->save();

            return response()->json([
                'status' => true,
                'message' => "Student has been saved to database",
            ], 200);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function getStudents()
    {
        $students = Student::all();
        return response()->json($students);
    }
}
