<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    use HasFactory;
    public function exam(){
     return $this->belongsTo(Exam::class);   
    }
    protected $guarded= ['id' ,'created_at','updated_at'];
   
}
