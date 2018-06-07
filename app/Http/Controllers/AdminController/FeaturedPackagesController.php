<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Featured_package;

class FeaturedPackagesController extends Controller
{
    //
    public function index() {
        $featured_packages = Featured_package::all();
        return view('admin.featured_package', ['featured_packages' => $featured_packages]);
    }

    public function store(Request $request) {
        //
        if(Auth::guard('admin')->user()){
            $featurePackage = new Featured_package();
            
            $featurePackage->name = $request->input('name');
            $featurePackage->price = $request->input('price');
            $featurePackage->discount = $request->input('discount');
            $featurePackage->featured_type = $request->input('featured_type');
            $featurePackage->featured_amount = $request->input('featured_amount');
            $featurePackage->duration = $request->input('duration');
            $featurePackage->save();
            
            return redirect()->route('admin.featuredPackages.show')->with('status', 'New featured package successfully Added!!');
        }
        // redirect 
        return back()->withInput()->with('errors', 'Fseatured package added failed !!');
    }
}
