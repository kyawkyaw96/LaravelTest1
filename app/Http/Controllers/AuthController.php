<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $formData = request()->validate([
            'name' => ['required', 'min:3', 'max:25', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'password' => ['required', 'min:8'],

        ]);
        $user = User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success', "Welcome $user->name");
        // User::create([
        //     'name' => 'kkk',
        //     'username' => 'sdfsdfsd',
        //     'email' => 'sdfasdf@gmail.com',
        //     'password' => 'sdfsdfsdfs'
        // ]);
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Good Bye');
    }
}
