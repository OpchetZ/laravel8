<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Surachet extends Controller
{
    public function mainchet(){
        return view("surachet/mainchet");
    }
}
