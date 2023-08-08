<?php

namespace App\Http\Controllers\admin;

use App\Models\Exam;
use App\Models\Skill;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{

    public function index(){
        $data['exams']=Exam::select('id','name','skill_id','img','Question_num','duration_mins','active')->orderBy('id','desc')->paginate(10);
     
        return view('admin.exams.index')->with($data);   
       
    }
  
   public function show(Exam $exam){
    $data['exam'] = $exam;
    return view('admin.exams.show')->with($data);   
   }

  public function showQues(Exam $exam){
    
    $data['exam'] = $exam;
    return view('admin.exams.question')->with($data);   
  }
   public function creat(){
    $data['skills']=Skill::get();
    return view('admin.exams.creatExam')->with($data);   
   }
 public function store(Request $request ){
  $request->validate([
    'name_en'=>'required|string|max:50', 
    'name_ar'=>'required|string|max:50',
    'desc_ar' =>'required|string|max:5000',
    'desc_en' =>'required|string|max:5000',
    'img'=>'required|image|max:2048',    
    'skill_id'  => 'required|exists:skills,id',
    'Question_num'=> 'required|integer|min:1',
    'difficulty'   => 'required|integer|min:1|max:5',
    'duration_mins' => 'required|integer|min:1'
    ]);
      $file=$request->file("img");
          $nameFile = $file->getClientOriginalName();
          $file->storeAs('uploads/exams/', $file->getClientOriginalName(),'upload_attachments');
         
    $exam =Exam::create([
     
      'name'=> json_encode([
      'en' => $request-> name_en,
      'ar' => $request -> name_ar,
      ]) ,
      'desc'=> json_encode([
        'en' => $request-> desc_en,
        'ar' => $request -> desc_ar,
        ]), 
        'duration_mins' =>$request-> duration_mins,
        'difficulty'=>$request -> difficulty,
        'Question_num'=> $request -> Question_num, 
        'skill_id' =>$request->skill_id,
        'img'=> $nameFile, 
      ]);
     $request->session()->flash('prev',"exam/$exam->id");
   return redirect(url("dashboard/exams/questions/creat/$exam->id"));  
   
 }

 public function creatQues(Exam $exam ){

  if(session('prev')!== "exam/$exam->id" and session('current') !== "exam/$exam->id"){
    return redirect(url("dashboard/exams"));
  }
  $data['examId'] = $exam -> id;
  $data['Question_num'] = $exam -> Question_num;
 
  return view('admin.exams.questionsCreat')->with($data);
 }
 public function storeQues(Exam $exam , Request $request){
  $request->session()->flash('current',"exam/$exam->id");
  $request->validate([
   'titles'=>'required|array',
   'titles.*' => 'required|string|max:500',
   'Right_answer'=>'required|array',
   'Right_answer.*' => 'required|in:1,2,3,4',
   'options_1'=>'required|array',
   'options_1.*' => 'required|string|max:255',
   'options_2'=>'required|array',
   'options_2.*' => 'required|string|max:255',
   'options_3'=>'required|array',
   'options_3.*' => 'required|string|max:255',
   'options_4'=>'required|array',
   'options_4.*' => 'required|string|max:255',

  ]);
  for($i = 0 ; $i < $exam ->Question_num ; $i++){
    Question::create([
    'exam_id'=> $exam -> id ,
    'title' => $request ->titles[$i] ,
    'Right_answer'=>$request ->Right_answer[$i],
     'option_1'=> $request -> options_1[$i] ,
     'option_2' => $request ->options_2[$i]  ,
     'option_3' =>$request -> options_3[$i] ,
     'option_4' => $request -> options_4[$i] ,
    ]);
  }
  return redirect(url("dashboard/exams"));
 }

// function update

public function editExam(Exam $exam){
$data['exam'] = $exam;
$data['skills'] = Skill::select('name','id')->get();
return view('admin.exams.editExam')->with($data);

}
public function updateExam(Request $request,Exam $exam){
  $request->validate([
    'name_en'=>'required|string|max:50', 
    'name_ar'=>'required|string|max:50',
    'desc_ar' =>'required|string|max:5000',
    'desc_en' =>'required|string|max:5000',
    'img'=>'nullable|image|max:2048',    
    'skill_id'  => 'required|exists:skills,id',
    'Question_num'=> 'required|integer|min:1',
    'difficulty'   => 'required|integer|min:1|max:5',
    'duration_mins' => 'required|integer|min:1'
    ]);
         $file=$exam->img;
          if($request->hasFile('img')){
            Storage::disk('upload_attachments')->deleteDirectory('uploads/exams/',$file);
            
            $file=$request->file("img");
           
            $file->getClientOriginalName();
            $file->storeAs('uploads/exams/', $file->getClientOriginalName(),'upload_attachments');
          }
    $exam ->update([
     
      'name'=> json_encode([
      'en' => $request-> name_en,
      'ar' => $request -> name_ar,
      ]) ,
      'desc'=> json_encode([
        'en' => $request-> desc_en,
        'ar' => $request -> desc_ar,
        ]), 
        'duration_mins' =>$request-> duration_mins,
        'difficulty'=>$request -> difficulty,
        'Question_num'=> $request -> Question_num, 
        'skill_id' =>$request->skill_id,
        'img'=> $file, 
      ]);
      return redirect(url("dashboard/exams/show/{$exam -> id}"));
}
// update questions
public function editQuestion(Exam $exam , Question $question){
  $data['exam'] =$exam;
  $data['question'] = $question;
  return view('admin.exams.editQuestion')->with($data);
}
public function updateQuestion(Exam $exam ,Question $question,Request $request){
  $data=$request->validate([
    'title' => 'required|string|max:500',
    'Right_answer' => 'required|in:1,2,3,4',
    'option_1'=>'required|string|max:255',
    'option_2' => 'required|string|max:255',
    'option_3'=>'required|string|max:255',
    'option_4' => 'required|string|max:255',
   
  ]);
  $question->update($data);
  $request->session()->flash("messg",'question update successfuly' );
  return redirect(url("dashboard/exams/questions/{$exam -> id}"));
}
// end update question
 //start function delete
 public function delete(Exam $exam ,Request $request){
  try{
     $file= $exam->img;
     $exam ->questions()->delete();
    $exam->delete();
    Storage::disk('upload_attachments')->deleteDirectory('uploads/exams/',$file);
    $mesg = 'row delete successfuly';
  }catch(Exception $e){
    $mesg = 'can not delete the exam';
  } 
  $request->session()->flash("messg",$mesg );
  return back();
}

 // start function toggle
 public function toggle(Exam $exam){
  $exam->update([
   'active' => !$exam -> active 
  ]);
 
  return back();
}
}
