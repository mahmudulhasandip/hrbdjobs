<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Job_level;

class JobLevelsController extends Controller
{
    //
    public function index() {
        $job_levels = Job_level::all();
        return view('admin.job_level', ['job_levels' => $job_levels]);
    }

    public function store(Request $request) {
        //
        if(Auth::guard('admin')->user()){

            Job_level::create([
                'name' => $request->input('job_level'),
            ]);
            return redirect()->route('admin.jobLevels.show')->with('status', 'New Job Level successfully Added!!');
        }
        // redirect 
        return back()->withInput()->with('errors', 'Job Level added failed !!');
    }
}
