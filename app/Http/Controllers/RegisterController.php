<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function store(Request $request) {
        $message = [
            'required'  => 'The :attribute is empty',
            'min'       => 'The :attribute minimum :min karakter',
            'max'       => 'The :attribute maksimum :max karakter',
            'unique'    => 'The :attribute already exist'
        ];

        $validatedData = $request->validate([
            'name'      => 'required|min:3|max:50',
            'email'     => 'required|email',
            'password'  => 'required|min:3'
        ], $message);

        // dd($validatedData);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('login');
    }
}
