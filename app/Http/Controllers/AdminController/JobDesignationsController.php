<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Job_designation;

class JobDesignationsController extends Controller
{
    //
    public function index() {
        $data['menu_active'] = 'job_designation';
        $data['job_designations'] = Job_designation::all();
        return view('admin.job_designation', $data);
    }

    public function store(Request $request) {
        // //
        if(Auth::guard('admin')->user()){

            Job_designation::create([
                'name' => $request->input('job_designation'),
            ]);
            return redirect()->route('admin.jobDesignation.show')->with('status', 'New Job Designation successfully Added!!');
        }
        // // redirect 
        return back()->withInput()->with('errors', 'Job Designation added failed !!');
    }
}
