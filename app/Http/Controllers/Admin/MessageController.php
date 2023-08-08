<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\ContactResponseMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    //
   public function index(){
   $data['messages']= Message::select('id','name','email')->orderBy('id','Desc')->paginate(10);
   return view('admin.messages.index')->with($data);
   }

   public function show(Message $message){
    $data['message']= $message;
    return view('admin.messages.show')->with($data);
   }
   public function respone(Request $request, Message $message){
  $request ->validate([
    'title'=>'required|string|max:255',
    'body' =>'required|string|max:2000'
  ]);
  $reciverMail = $message ->email 
 
 
  try {

    Mail::to($reciverMail)->send(new ContactResponseMail ($message->name ,$request ->title ,$request ->body ));

} finally {

    return "there is problem in network"; 

}
 
}
  
}
