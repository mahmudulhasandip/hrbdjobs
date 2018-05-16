<?php

namespace App\Http\Controllers\EmployerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    //
    public function dashboard(){
        
        return view('employer.dashboard');
    }

    public function getNewJob(){
        return view('employer.post_new_job');
    }

    public function getDraftedJob(){
        return view('employer.drafted_job');
    }

    public function getManageJob(){
        return view('employer.manage_job');
    }

    public function getProfile(){
        return view('employer.profile');
    }

    public function getEditProfile(){
        return view('employer.edit_profile');
    }

    public function getCompanyProfile(){
        return view('employer.comapny_profile');
    }

    public function getEditCompanyProfile(){
        return view('employer.edit_company_profile');
    }

    public function getCandidateShortList(){
        return view('employer.shortlisted_job');
    }

    public function getBrowseResume(){
        return view('employer.browse_resume');                      
    }
}
