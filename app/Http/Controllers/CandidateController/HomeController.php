<?php

namespace App\Http\Controllers\CandidateController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function dashboard(){
        $data['left_active'] = 'dashboard';
        return view('candidate.dashboard', $data);
    }
}
