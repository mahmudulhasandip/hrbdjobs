<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Employer_package;

class employerPackageList extends Controller
{
    public function index() {
        $data['menu_active'] = 'employer_package_list';
        $data['packages'] = Employer_package::orderBy('is_verified', 'asc')->get();
        return view('admin.employer_package_list', $data);
    }

    public function approve($packageId) {
        $package = Employer_package::find($packageId);
        
        if($package->is_verified == 1){
            $package->is_verified = 0;
            $msg = 'Employer status make pending';
        } else{
            $package->is_verified = 1;
            $msg = 'Employer status make approved';
        }
        
        $package->save();
        return redirect()->route('admin.employer.package.list')->with('status', $msg);
    }
}