<?php

namespace App\Http\Controllers;

use App\Models\Fan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->orderBy('created_at', 'desc')->take(10)->get();
        $fans = $user->fans()->get();
        $stars = $user->stars()->get();
        $user = User::withCount(['stars', 'fans', 'posts'])->find($user->id);
        return view('user.index', compact('posts', 'fans', 'stars', 'user'));
    }

    // 关注
    public function fan(User $user)
    {
        // fan_id, star_id
        Fan::findOrCreate(['fan_id' => Auth::id(), 'star_id' => $user->id]);
        return [
            'error' => 0,
            'message' => ''
        ];
    }

    // 取消关注
    public function unfan(User $user)
    {
        // fan_id, star_id
        Auth::id();
        Fan::where('fan_id', Auth::id())->where('star_id', $user->id)->delete();
        return [
            'error' => 0,
            'message' => ''
        ];
    }
}
