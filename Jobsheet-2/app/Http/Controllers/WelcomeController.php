<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
public function greeting(){
    return view('blog.hello')
        ->with('name', 'Mokhamad Rizki Hadiono Singgih')
        ->with('occupation', 'Astronaut');
}
}

