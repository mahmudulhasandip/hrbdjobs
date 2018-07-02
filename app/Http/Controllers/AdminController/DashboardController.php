<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $data['menu_active'] = 'dashboard';
        return view('admin.dashboard', $data);
    }
}
