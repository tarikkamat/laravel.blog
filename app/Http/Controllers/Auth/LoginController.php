<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.auth.login');
    }

    public function loginAction(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('toast_success', 'Successfully logged in!');
        } else {
            return back()->with('toast_error', 'Opps! Something went wrong.');
        }
    }

    public function logoutAction()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('toast_success', 'Successfully logged out!');
    }
}
