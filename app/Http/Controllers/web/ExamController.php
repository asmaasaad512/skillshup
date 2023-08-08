<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    //
    public function show(Exam $exam){
        $data['exam']=$exam ;
        $user=Auth::user();
        $data['canviewBtnExam']=true;
        if($user != null){
        $userExamOld=$user->exams()->where('exam_id',$exam->id)->first();
        if($userExamOld != null and $userExamOld->pivot->status == "closed" ){
            $data['canviewBtnExam'] = false;
        }   
        }
        
    
        return view('web.exams.show')->with($data); 
       }

       function start($examId , Request $request){
        $user = Auth::user();
        if(! $user->exams->contains($examId)){
            $user->exams()->attach($examId);
        }else{
         $user->exams()->updateExistingPivot($examId,[
        'status'=>'closed'
         ]);   
        }
         $request->session()->flash("prev","start/$examId");
           
            return redirect(url("exams/questions/$examId"));
          
    
       }
       public function questions($id, Request $request){
        $data['exam']=Exam::findOrfail($id) ;
        $data['allexam']=Exam::get() ;
        $user = Auth::user();
        if(session("prev") !== "start/$id"){
            return redirect(url("exams/show/$id"));   
            }
            $request->session()->flash("prev","question/$id");

        
        return view('web.exams.questions')->with($data); 
       }
    // function submit
    public function submit(Exam $exam , Request $request ){
    $examId= $exam -> id;
     $request->validate([
     'answer'=>'required|array',
     'answer.*'=>'required|in:1,2,3,4',

     ]);
     $points = 0;
     $counQuestion= $exam ->questions()->count();
     foreach($exam->questions as $question)
     if(isset($request ->answer[$question->id])){
     $userAnswer = $request ->answer[$question->id];    
     $rightAnswer =$question ->Right_answer ;
      if($userAnswer == $rightAnswer){
         $points += 1;  
      }
    
     }
      $score =($points / $counQuestion) * 100;
      //time exam
      $submiteTime = Carbon::now();
      $user=Auth::user();
      $pivorow= $user->exams()->where('exam_id',$examId)->first();

      $startTime = $pivorow->pivot -> created_at;
      
      $timemin=$startTime->diffInMinutes($submiteTime);
       if($timemin > $pivorow -> duration_mins){
        $score = 0 ;
       }
       $request->session()->flash('success',"your finisfed exam and your Score $score");
     /* update pivo*/
     $user->exams()->updateExistingPivot($examId,[
      'score' => $score ,
      'time_mins' =>   $timemin 
     ]);
   
     return redirect( url("exams/show/$examId"));
    }     
}