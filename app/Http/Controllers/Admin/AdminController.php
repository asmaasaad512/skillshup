<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
class AdminController extends Controller
{
public function index(){
    $superadmRole = Role::where('name','superadmin')->first();
    $admnintRole = Role::where('name','admin')->first();      
    $data['admins']= User::whereIn('role_id',[$admnintRole ->id,$superadmRole ->id])->orderBy('id','Desc')->paginate(10);
    return view('admin.admins.index')->with($data);
 
}


    //  function add admin or superadmin
     //  function add admin or superadmin
     public function create(){
        $data['admins']=Role::select('id','name')->whereIn('name',['admin','superadmin'])->get();
        return view('admin.admins.creat')->with($data);
        
    }
    public function store(Request $request){
   $request->validate([
    'name' =>'required|string|max:255',
    "email" =>'required|email|max:255',
    "password" =>'required|string|confirmed|min:6|max:25',
    'role_id' =>'required|exists:roles,id'
   ]);
   $user=User::create([
      'name' =>$request ->name,
      'email' => $request ->email,
      'password'=>Hash::make($request ->password),
      'role_id'=> $request ->role_id 
     ]);
    
event(new Registered($user));
     return redirect(url('dashboard/admins'));
}

public function promote($id){
    $admin =User::findOrFail($id);
    $admin->update([
    'role_id' =>Role::select('id')->where('name','superadmin')->first()->id     
    ]) ;
    return back(); 
      

}
public function depromote($id){
    $admin =User::findOrFail($id);
    $admin->update([
    'role_id' =>Role::select('id')->where('name','admin')->first()->id     
    ]) ;
    return back(); 
}

}
