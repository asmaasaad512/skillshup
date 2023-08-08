<?php

namespace App\View\Components;

use App\Models\category;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
   
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['cats']=category::select('id','name')->orderBy('id','Desc')->where('active',1)->get();
        return view('components.navbar')->with($data);
       
    }
}
