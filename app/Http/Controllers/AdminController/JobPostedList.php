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
        $data['jobs'] = Job::orderBy('is_verified', 'asc')->get();
        return view('admin.job_post_list', $data);
    }

    public function approve($jobId) {
        $job = Job::find($jobId);
        if($job->is_verified == 1){
            $job->is_verified = 0;
            $msg = 'Job post status make pending';
        } else{
            $job->is_verified = 1;
            $msg = 'Job post status make approved';
        }

        $job->save();

        return redirect()->route('admin.job.post.list')->with('status', $msg);
    }


}
