<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Payment_history;

class EmployerPaymentHistory extends Controller
{
    public function index() {
        $data['menu_active'] = 'employer_payment_history';
        $data['payments'] = Payment_history::all();
        // $data['packages'] = Payment_history::orderBy('is_verified', 'asc')->get();
        return view('admin.employer_payment_history', $data);
    }
}
