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
        try{
            $students = Student::all();
            return response()->json([
                'status' => true,
                'message' => "Students has been fetched",
                'data' => $students,
            ], 200);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function deleteStudent($id)
    {
        try{
            $student = Student::find($id);
            $student->delete();

            return response()->json([
                'status' => true,
                'message' => "Student has been deleted",
            ], 200);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function updateStudent(StudentRequest $request, $id){
        try{
            $student = Student::find($id);
            $student->update($request->all());

            return response()->json([
                'status' => true, 
                'message' => "Student updated successfully",
            ], 200);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
