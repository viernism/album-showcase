<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    
    public function registerUser(Request $request){
        $attributes=$request->all();
        $attributes['password']=Hash::make($request->password);
        $user=User::create($attributes);

        return redirect('/');
    }
}
