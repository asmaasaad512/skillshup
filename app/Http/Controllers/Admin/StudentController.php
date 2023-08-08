<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exam;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    //
    public function index(){
   $studentRole = Role::where('name','student')->first();    
   $data['students']= User::where('role_id',$studentRole ->id)->orderBy('id','Desc')->paginate(10);
   return view('admin.students.index')->with($data);

    }
    public function showScors($id){
      $student= User::findOrFail($id);
      if($student ->role->name !== 'student'){
     return back();
      }
      $data['student'] = $student;
      $data['exams']= $student ->exams;
    return view('admin.students.showScors')->with($data);
    }
    //function openExam
    public function openExam($examId ,$studentId){
        $student= User::findOrFail($studentId);
        $exams= $student ->exams;
        if($student ->role->name !== 'student'){
       return back();
        }
        $student->exams()->updateExistingPivot($examId,[
            'status' => 'opened'
             
           ]);
           return back();
    }
    //function closedExam
    public function closedExam($examId ,$studentId){
        $student= User::findOrFail($studentId);
        if($student ->role->name !== 'student'){
       return back();
        }
        $student->exams()->updateExistingPivot($examId,[
            'status' => 'closed'
             
           ]);
           return back();
    }

}
