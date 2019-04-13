<?php

namespace App\Admin\Controllers;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::get();
        return view('admin.topics.index', compact('topics'));
    }

    public function create()
    {
        return view('admin.topics.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|unique:topics,name'
        ]);
        Topic::create($request->only('name'));

        return redirect('admin/topics')->with('success', '添加成功');
    }

    public function edit(Topic $topic)
    {
        return view('admin.topics.edit', compact('topic'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required|max:50|unique:topics,name,' . $id,
        ]);
        $topic = Topic::findOrFail($id);
        $topic->name = request('name');
        $topic->save();

        return redirect('admin/topics')->with('success', '修改成功');
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect('admin/topics')->with('success', '删除成功');
    }

}
