<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{
    private function authCheck()
    {
        if (Auth::check()) {
            return Auth::user()->name;
        }
    }

    public function index()
    {
        $username = $this->authCheck();
        if ($username == '') {
            return view('login');
        } else {
            return redirect("contactList");
        }
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('contactList');
        } else {
            return redirect("/")->withErrors(['msg' => 'login error']);
        }
    }

    public function registration()
    {
        $username = $this->authCheck();
        if ($username == '') {
            return view('registration');
        } else {
            return redirect("contactList");
        }
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("/")->with('success', 'Register success!');;
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
