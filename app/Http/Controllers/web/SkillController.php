<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    //
    public function show(Skill $skill){
      $data['skill']=$skill;
      $data['allExame']=$skill->exams;
      
    
      
        return view('web.skills.show')->with($data); 
    
    }
}
