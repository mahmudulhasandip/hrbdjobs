<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Institute_name;

class InstituteController extends Controller
{
    public function index()
    {
        $data['menu_active'] = 'institute';
        $data['institutes'] = Institute_name::all();
        return view('admin.institute')->with($data);
    }

    public function store(Request $request)
    {
        $institute = new Institute_name();
        $institute->name = $request['name'];
        $institute->save();

        return redirect()->back()->with('status', 'Institute Added');
    }

    public function delete($id) {
        $institute = Institute_name::findOrFail($id);
        $institute->delete();
        $msg = 'Institute has been deleted!';

        return $msg;
    }

    public function update(Request $request){
        $id = $request->input('institute_id');
        $institute = Institute_name::findOrFail($id);
        $institute->name = $request->input('name');
        $institute->save();
        $msg = 'Institute name updated.';
        return redirect()->route('admin.institute.list')->with('status', $msg);
    }
}
