<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Job_package;

class JobPackagesController extends Controller
{
    //
    public function index() {
        $data['menu_active'] = 'job_package';
        $data['job_packages'] = Job_package::all();
        return view('admin.job_package', $data);
    }

    public function store(Request $request) {
        //
        if(Auth::guard('admin')->user()){

            Job_package::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
                'job_post' => $request->input('job_post'),
                'duration' => $request->input('duration'),
            ]);
            return redirect()->route('admin.jobPackages.show')->with('status', 'New job package successfully Added!!');
        }
        // redirect 
        return back()->withInput()->with('errors', 'Job package added failed !!');
    }
}
