<?php

namespace App\Http\Controllers\EmployerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    //
    public function dashboard(){
        $data['left_active'] = 'dashboard';
        return view('employer.dashboard', $data);
    }

    public function getNewJob(){
        $data['left_active'] = 'job';
        return view('employer.post_new_job', $data);
    }

    public function getDraftedJob(){
        $data['left_active'] = 'job';
        return view('employer.drafted_job', $data);
    }

    public function getManageJob(){
        $data['left_active'] = 'manage_job';
        return view('employer.manage_job', $data);
    }

    public function getProfile(){
        $data['left_active'] = 'profile';
        return view('employer.profile', $data);
    }

    public function getEditProfile(){
        $data['left_active'] = 'profile';
        return view('employer.edit_profile', $data);
    }

    public function getCompanyProfile(){
        $data['left_active'] = 'company';
        return view('employer.comapny_profile', $data);
    }

    public function getEditCompanyProfile(){
        $data['left_active'] = 'company';
        return view('employer.edit_company_profile', $data);
    }

    public function getCandidateShortList(){
        $data['left_active'] = 'shortlisted';
        return view('employer.shortlisted_job', $data);
    }

    public function getBrowseResume(){
        $data['left_active'] = 'browse_resume';
        return view('employer.browse_resume', $data);                      
    }
}
