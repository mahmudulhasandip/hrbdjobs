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

            Featured_package::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
                'featured_type' => $request->input('featured_type'),
                'featured_amount' => $request->input('featured_amount'),
                'duration' => $request->input('duration'),
            ]);
            return redirect()->route('admin.featuredPackages.show')->with('status', 'New featured package successfully Added!!');
        }
        // redirect 
        return back()->withInput()->with('errors', 'Fseatured package added failed !!');
    }
}
