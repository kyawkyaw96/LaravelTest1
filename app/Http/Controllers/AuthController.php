<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
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
        // auth()->login($user);
        return redirect('/login');
        // User::create([
        //     'name' => 'kkk',
        //     'username' => 'sdfsdfsd',
        //     'email' => 'sdfasdf@gmail.com',
        //     'password' => 'sdfsdfsdfs'
        // ]);
    }


    public function login()
    {
        return view('auth.login');
    }
    public function post_login()
    {
        $formData = request()->validate([
            'email' => ['required', 'max:255', Rule::exists('users', 'email')],
            'password' => ['required', 'min:3', 'max:255']
        ], ['password' => 'Email or password does not match.']);

        if (auth()->attempt($formData)) {
            return redirect('/')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'password' => 'Email or password does not match.',
        ])->onlyInput('email');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Good Bye');
    }
}
