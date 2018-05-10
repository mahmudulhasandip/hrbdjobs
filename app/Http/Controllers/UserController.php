<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data['title'] = "Hello";
        return view('users.home')->with($data);
    }
}
