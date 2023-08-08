<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
     public function index(){
        $data['skills']=Skill::orderBy('id','desc')->paginate(10);
        $data['cats']=Category::get();
       
       
        return view('admin.skills.index')->with($data);   
       }
       /* function store */
       public function store(Request $request){
        
         $request->validate([
          'name_en'=>'required|string|max:100', 
          'name_ar'=>'required|string|max:100', 
          'category_id' =>'required|exists:categories,id',
          'img'=>'required|image|max:2048',    
          ]);

          
          $file=$request->file("img");
          $nameFile = $file->getClientOriginalName();
          $file->storeAs('uploads/skills/', $file->getClientOriginalName(),'upload_attachments');
         
         Skill::create([
            
            'category_id' =>$request->category_id,
            'img'=> $nameFile, 
            'name'=> json_encode([
            'en' => $request-> name_en,
            'ar' => $request -> name_ar,
            ])
            ]);
 
         $request->session()->flash("messg","row add successfuly" );
       
         return back();
      }
      public function delete(Skill $skill ,Request $request){
         try{
            $file= $skill->img;
           $skill->delete();
           Storage::disk('upload_attachments')->deleteDirectory('uploads/skills/',$file);
           $mesg = 'row delete successfuly';
         }catch(Exception $e){
           $mesg = 'can not delete the skill';
         } 
         $request->session()->flash("messg",$mesg );
         return back();
       }
       /* function update*/
       public function update(Request $request){
         $skill= Skill::findOrFail($request->id);
         $request->validate([
           'id'=>'required|exists:skills,id',
          'name_en'=>'required|string|max:100', 
          'name_ar'=>'required|string|max:100', 
          'img'=>'nullable|image|max:2048', 
          'category_id' =>'required|exists:categories,id',   
          ]);
          $file=$skill->img;
          
          if($request->hasFile('img')){
            Storage::disk('upload_attachments')->deleteDirectory('uploads/skills/',$file);
            
            $file=$request->file("img");
           
            $file->getClientOriginalName();
            $file->storeAs('uploads/skills/', $file->getClientOriginalName(),'upload_attachments');
          }
         $skill->update([
          'category_id' =>$request->category_id,
          'img'=> $file, 
          'name'=> json_encode([
            'en' => $request-> name_en,
            'ar' => $request -> name_ar, 
          ])
          
         ]);
         $request->session()->flash("messg","row update successfuly");
         
         return back();
      } 
      public function toggle(Skill $skill){
        $skill->update([
        'active'=> ! $skill->active  
        ]);
        return back();
      }
}
