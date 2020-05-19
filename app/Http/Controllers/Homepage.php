<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homepage extends Controller
{
   public function Homepage(){
       return view('Homepage');
   }
}
