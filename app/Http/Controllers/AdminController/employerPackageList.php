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
        $data['employers'] = Employer_package::all();
        return view('admin.employer_list', $data);
    }
}
