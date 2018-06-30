<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Employer;

class EmployerListController extends Controller
{
    public function index() {
        $data['menu_active'] = 'employer_list';
        $data['employers'] = Employer::all()->where('verified', 1);
        return view('admin.employer_list', $data);
    }

    public function approve($empId) {
        $employer = Employer::find($empId);
        if($employer->status == 1){
            $employer->status = 0;
            $msg = 'Employer status make pending';
        } else{
            $employer->status = 1;
            $msg = 'Employer status make approved';
        }

        $employer->save();

        return redirect()->route('admin.employerList.show')->with('status', $msg);
    }

    public function deleteEmployer($id) {
        $employer = Employer::find($id);
        $employer->delete();
        return redirect()->route('admin.employerList.show')->with('status', "$employer->fname successfully deleted.");
    }
}
