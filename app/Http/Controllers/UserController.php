<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */

    public function register()
    {
        return view('auth.register');
    }

    public function checkRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|max:30'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return view('auth.login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:users,email',
            'password' => 'required|min:6|max:30'
        ]);
        $cred = array('email' => $request->email,
        'password'=>$request->password);

        if (Auth::attempt($cred)){
            return redirect('AddAlbum');
        }
        else{
            return redirect('login')->withErrors('Invalid credentials ');
        }

    }

    public function logout(){
        Auth::logout();
        return view('auth.login');
    }

}
