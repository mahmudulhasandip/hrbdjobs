<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Service_package;
use App\Service_package_item;

class ServicesController extends Controller
{
    public function index() {
        $data['menu_active'] = 'job_post_list';
        $data['services'] = Service_package::get();
        return view('admin.services_type', $data);
    }

    public function store(Request $request) {
        //
        if(Auth::guard('admin')->user()){

            $services = new Service_package();
            $services->name = $request->input('name');
            // Skill::create([
            //     'name' => $request->input('skill'),
            // ]);
            $services->save();
            return redirect()->route('admin.services_type.list')->with('status', 'New service type successfully Added!!');
        }
        // redirect
        return back()->withInput()->with('errors', 'Service type added failed !!');
    }

    public function delete($id) {
        $services = Service_package::findOrFail($id);
        $services->delete();
        $msg = 'Service type has been deleted!';

        return $msg;
    }

}
