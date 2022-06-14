<?php

namespace Tuanh\User\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Tuanh\User\Model\User;

class AuthController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getFormLogin()
    {
        return view('user::user.login-form');
    }

    public function postFormLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        $isLogin = User::checkLogin($email, $password);
        if ($isLogin) {
            $userLogin = User::where('email', $email)->firstOrFail();
            Auth::login($userLogin);
            return redirect()->route('index');
        } else {
            $request->session()->flash('error', 'Dang nhap that bai!');
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
