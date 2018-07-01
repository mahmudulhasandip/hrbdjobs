<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Job;

class JobPostedList extends Controller
{
    public function index() {
        $data['menu_active'] = 'job_post_list';
        $data['jobs'] = Job::all();
        return view('admin.job_post_list', $data);
    }
}
