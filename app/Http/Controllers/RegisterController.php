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
            'min'       => 'The :attribute minimum :min character',
            'max'       => 'The :attribute maximum :max character',
            'unique'    => 'The :attribute already exist', 
            'regex'     => 'The :attribute gabisa basa enggres, ketik ndiri nanti'
        ];

        $validatedData = $request->validate([
            'name'      => 'required|min:3|max:50|regex:/^[a-zA-Z0-9._]+$/',
            'email'     => 'required|email',
            'password'  => 'required|min:3'
        ], $message);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        // dd($validatedData);
        
        User::create($validatedData);

        // toastr()->success('Silahkan Login terlebih dahulu!', 'Berhasil Registrasi');
        return redirect()->route('login')->with('success', 'Registrasi Berhasil');
    }
}
