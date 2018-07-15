<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Candidate;

class CvbankController extends Controller
{
    public function index() {
        $data['menu_active'] = 'cvbank';
        $test = '2';
        $data['cvs'] = Candidate::all()
                                ->when($test, function($query){
                                    return $query->where('verified', 0);
                                });

        // dd($data['cvs']);
        return view('admin.cv_bank', $data);
    }
}
