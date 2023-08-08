<?php

namespace App\Http\Controllers\web;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show(Category $category){

        $data['category']=$category;
        $data['allCat']=Category::select('id','name')->get();
        $data['skills']= $category->skills()->paginate(3);
           return view('web.categories.show')->with($data); 
    }

    // public function scopeActive($query)
    // {
    //   return  $query->where('active', 1);
    // }
}
