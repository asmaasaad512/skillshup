<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CategoryController extends Controller
{
     //
     public function index(){
        $data['cats']=Category::orderBy('id','desc')->paginate(5);
        return view('admin.cats.index')->with($data);   
       }
       public function store(Request $request){
          $request->validate([
           'name_en'=>'required|string|max:100', 
           'name_ar'=>'required|string|max:100',    
           ]);
           Category::create([
           'name'=> json_encode([
             'en' => $request-> name_en,
             'ar' => $request -> name_ar 
           ])
          ]);
          $request->session()->flash("messg","row add successfuly" );
        
          return back();
       }
       public function delete(Category $category ,Request $request){
         try{
           $category->delete();
           $mesg = 'row delete successfuly';
         }catch(Exception $e){
           $mesg = 'can not delete the category';
         }
         
         $request->session()->flash("messg",$mesg );
         return back();
       }
       public function update(Request $request){
         $request->validate([
           'id'=>'required|exists:categories,id',
          'name_en'=>'required|string|max:100', 
          'name_ar'=>'required|string|max:100',    
          ]);
          Category::findOrFail($request->id)->update([
          'name'=> json_encode([
            'en' => $request-> name_en,
            'ar' => $request -> name_ar, 
          ])
         ]);
         $request->session()->flash("messg","row update successfuly");
         
         return back();
      }
   
      public function toggle(Category $category){
       $category->update([
       'active'=> ! $category->active  
       ]);
       return back();
     }
}
