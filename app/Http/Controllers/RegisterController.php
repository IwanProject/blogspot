<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
    public function index()
    {

        return view('register.index', [
            'title' => 'register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'

        ]);


        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);


        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
