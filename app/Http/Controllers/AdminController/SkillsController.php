<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Skill;

class SkillsController extends Controller
{
    //
    public function index() {
        $skills = Skill::all();
        return view('admin.skill', ['skills' => $skills]);
    }

    public function store(Request $request) {
        //
        if(Auth::guard('admin')->user()){

            Skill::create([
                'name' => $request->input('skill'),
            ]);
            return redirect()->route('admin.skills.show')->with('status', 'New Skill successfully Added!!');
        }
        // redirect 
        return back()->withInput()->with('errors', 'Job Skill added failed !!');
    }
}
