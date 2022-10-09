<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $re)
    {
        $done =  Auth::attempt(['email' => $re->email, 'password' => $re->password]);

        if ($done) {
            return redirect()->route('dashbaord');
        } else {
            return redirect()->back()->with(['error' => 'some thing went wrom try agani']);
        }
    }
    public function dashboard()
    {
        return view('index');
    }
}