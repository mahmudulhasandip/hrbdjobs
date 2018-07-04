<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Employer_package;
use App\Payment_history;

class EmployerPackageList extends Controller
{
    public function index() {
        $data['menu_active'] = 'employer_package_list';
        $data['packages'] = Employer_package::orderBy('is_verified', 'asc')->orderBy('start_date', 'desc')->get();
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

    public function checkPayment(Request $request) {
        $employer_id = $request->input('employer_id');
        $employer_package_id = $request->input('employer_package_id');
        $data = Payment_history::where('employer_id', $employer_id)->where('employer_package_id', $employer_package_id)->first();
    
        $jobPackage = ($data->jobPackage) ? $data->jobPackage->name : '';
        $featuredPackage = ($data->featuredPackage) ? $data->featuredPackage->name : '';
        $all['package'] = ($jobPackage) ? $jobPackage : $featuredPackage;
        $all['price']   = $data->price;
        $all['discount'] = $data->discount;
        $all['transaction_type'] = $data->transaction_type;
        $all['transaction_id'] = $data->transaction_id;
        return json_encode($all);
    }
}