<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index.index');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('admin/login');
    }
}
