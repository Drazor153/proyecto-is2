<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show(){
        if (Auth::check()) {
            return redirect()->route('projects.index');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request){

        $user = User::create($request->validated());

        Auth::login($user);
        return redirect()->route('auth.login')->with('success', 'Cuenta creada exitosamente');
    }
}
