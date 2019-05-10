<?php

namespace App\Http\Controllers;

use App\Models\Fan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->orderBy('created_at',
            'desc')->with('user')->take(config('jlaravel.user_post_per_page'))->get();
        $user = User::withCount(['stars', 'fans', 'posts'])->find($user->id);
        $fans = $user->fans()->with('fuser')->get();
        $stars = $user->stars()->with('suser')->get();

        return view('user.index', compact('posts', 'user', 'fans', 'stars'));
    }

    // 关注
    public function fan(User $user)
    {
        // fan_id, star_id
        Fan::firstOrCreate(['fan_id' => Auth::id(), 'star_id' => $user->id]);
        $arr = [
            'error' => 0,
            'message' => '',
        ];

        return json_encode($arr);
    }

    // 取消关注
    public function unfan(User $user)
    {
        // fan_id, star_id
        Auth::id();
        Fan::where('fan_id', Auth::id())->where('star_id', $user->id)->delete();

        return [
            'error' => 0,
            'message' => '',
        ];
    }

    public function setting()
    {
        $user = Auth::user();

        return view('user.setting', compact('user'));
    }

    public function settingStore(Request $request)
    {
        $this->validate(request(), [
            'name' => 'min:3',
        ]);

        $name = request('name');
        $user = Auth::user();
        if ($name != $user->name) {
            if (\App\User::where('name', $name)->count() > 0) {
                return back()->withErrors('用户名已经被占用！');
            }
            $user->name = request('name');
        }
        if ($request->file('avatar')) {
            $path = $request->file('avatar')->storePublicly(md5(Auth::id().time()));
            $user->avatar = "/storage/".$path;
        }

        $user->save();

        return back()->with('success', '设置成功');
    }

    public function emailVerificationRequired(){
        return view('user.edit_email_notify');
    }

    public function sendVerificationMail(){
        $user= Auth::user();
        $this->sendEmailConfirmationTo($user);
        return redirect('/')->with('success', '验证邮件已发送到您的注册邮箱上，请注意查收。');
    }

    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.email_verification';
        $data = compact('user');
        $to = $user->email;
        $subject = '感谢注册' . config('app.name') . '，请验证邮箱';

        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    public function verifiedEmail($token){
        $user = User::where('verification_token',$token)->first();
        $user->verified = true;
        $user->verification_token = null;
        $user->save();
        Auth::login($user);
        return redirect('/')->with('success', '恭喜您，邮箱验证成功！');
    }
}
