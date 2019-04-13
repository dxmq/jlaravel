<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    public function index()
    {
        // 获取我收到的通知
        $user = Auth::user();
        $notices = $user->notices;

        return view('notices.index', compact('notices'));
    }
}
