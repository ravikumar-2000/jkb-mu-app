<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showUsers()
    {
        return view('showusers', ['records' => User::all()]);
    }

    public function create()
    {
        return view('register');
    }

    public function store()
    {
        $attriutes = request()->validate([
            'name' => ['required', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email:rfc,dns', Rule::unique('users', 'email')],
            'password' => ['required'],
            'phone' => ['required', 'min:10', 'max:10'],
            'location' => ['required'],
        ]);

        $user = User::create($attriutes);

        // auth() -> login($user);
        session()->flash('success', 'Your Account has been Created!');
        return redirect('/?d');
    }

    public function login()
    {
    }
}
