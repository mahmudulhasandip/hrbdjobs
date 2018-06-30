<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Job_experience;

class JobExperiencesController extends Controller
{
    //
    public function index() {
        $data['menu_active'] = 'job_experience';
        $data['job_experiences'] = Job_experience::all();
        return view('admin.job_experience', $data);
    }

    public function store(Request $request) {
        //
        if(Auth::guard('admin')->user()){

            Job_experience::create([
                'name' => $request->input('job_experience'),
            ]);
            return redirect()->route('admin.jobExperience.show')->with('status', 'New Job Experience successfully Added!!');
        }
        // redirect 
        return back()->withInput()->with('errors', 'Job Experience added failed !!');
    }
}
