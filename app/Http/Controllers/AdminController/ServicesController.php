<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Service_package;
use App\Service_package_item;

class ServicesController extends Controller
{
    // service type add view
    public function index() {
        $data['menu_active'] = 'add_service';
        $data['services'] = Service_package::get();
        return view('admin.services_type', $data);
    }

    // store new service type
    public function store(Request $request) {
        //
        if(Auth::guard('admin')->user()){

            $services = new Service_package();
            $services->name = $request->input('name');
            $services->save();
            return redirect()->route('admin.services_type.list')->with('status', 'New service type successfully Added!!');
        }
        // redirect
        return back()->withInput()->with('errors', 'You are not authorized !!');
    }

    // delete service type
    public function delete($id) {
        $services = Service_package::findOrFail($id);
        $services->delete();
        $msg = 'Service type has been deleted!';

        return $msg;
    }

    // service add item view
    public function addItemView() {
        $data['menu_active'] = 'add_service_item';
        $data['services'] = Service_package::get();
        return view('admin.services_item', $data);
    }

    // service items store
    public function addItemStore(Request $request){
        if(Auth::guard('admin')->user()){
            $service_items = new Service_package_item();
            $service_items->service_package_id = $request->service_package_id;
            $service_items->title = $request->title;
            $service_items->details = $request->details;

            $service_items->save();
            return redirect()->route('admin.services_item.list');
        }
        // redirect
        return back()->withInput()->with('errors', 'You are not authorized!!');
    }

    // service items delete
    public function serviceItemDelete($id){
        $service_items = Service_package_item::findOrFail($id);
        $service_items->delete();
        $msg = 'Service item has been deleted!';

        return $msg;
    }

    // service items update
    public function addItemUpdate(Request $request) {
        if(Auth::guard('admin')->user()){
            $service_item = Service_package_item::find($request->service_item_id);
            $service_item->title = $request->title;
            $service_item->details = $request->details;
            $service_item->save();
            return redirect()->route('admin.services_item.list');
        }
        // redirect
        return back()->withInput()->with('errors', 'You are not authorized!!');
    }

}
