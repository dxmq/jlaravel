<?php

namespace App\Admin\Controllers;

use App\Jobs\SendMessage;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::all();
        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        ]);

        $notice = Notice::create(request(['title', 'content']));

        dispatch(new SendMessage($notice));

        return redirect('admin/notices')->with('success', '添加成功');
    }
}
