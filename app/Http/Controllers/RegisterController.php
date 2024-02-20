<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Register',
            'active'=> 'register'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|max:25|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:25',
        ]);

        // $validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);

        User::Create($validateData);

        return redirect('/login')->with('success', 'User created successfully! Please login');
    }
}
