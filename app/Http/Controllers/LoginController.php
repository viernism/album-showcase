<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        $user=['email'=>$request->email,'password'=>$request->password];

        if (Auth::attempt($user)) {
            return redirect('/');
        }

        throw ValidationException::withMessages([
            'email'=>'This email is not registered or not valid',
            'password'=>'Your password is invalid'
        ]);
    }
}
