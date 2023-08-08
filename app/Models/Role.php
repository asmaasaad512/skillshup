<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id' ,'created_at','updated_at'];
    use HasFactory;
    public function users(){
     return $this->hasMany(User::class);   
    }
   
}
