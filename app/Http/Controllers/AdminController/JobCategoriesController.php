<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Job_category;

class JobCategoriesController extends Controller
{
    //
    public function index() {
        $data['menu_active'] = 'job_category';
        $data['job_categories'] = Job_category::all();
        return view('admin.job_category', $data);
    }

    public function store(Request $request) {
        // //
        if(Auth::guard('admin')->user()){

            Job_category::create([
                'name' => $request->input('job_category'),
            ]);
            return redirect()->route('admin.jobCategories.show')->with('status', 'New Job Category successfully Added!!');
        }
        // // redirect 
        return back()->withInput()->with('errors', 'Job Category added failed !!');
    }
}
