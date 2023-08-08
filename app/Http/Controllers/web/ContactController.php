<?php

namespace App\Http\Controllers\web;

use App\Models\setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;

use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    // 
    function index(){
     $data['sett']=setting::select('phone','email')->first();   
     return view('web.contact.index')->with($data);   
    }
    public function send(Request $request){
    $validator=Validator::make($request->all(),[
     'name' => "required|string|max:255",
     "email"=>'required|email|max:255',
     'subject'=>'nullable|string|max:255',
     'body'=>'required|string'
    ]);
  
    if($validator->fails()){
        $errors=$validator->errors();
        return redirect(url('contact'))->withErrors($errors);
    }
   Message::create([
    'name' => $request->name,
    "email"=> $request->email,
    'body'=> $request->subject,
    'body'=> $request->body

   ]);
   $request->session()->flash('success','your message successfuly');
   return back();
        
}
}
