<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function create() {
        return view('login');
    }

    public function store() {
        $attributes = request() -> validate([
            'email' => ['required', Rule::exists('users', 'email')],
            'password' => ['required'],
        ]);

        if(auth() -> attempt($attributes)){
            session() -> regenerate();
            return redirect('/') -> with('success', 'You have successfully Logged In!');
        }

        throw ValidationException::withMessages([
            'email' => 'Invalid Credetials!',
            'password' => 'Invalid Credentials!',
        ]);

    }

    public function destroy() {
        auth() -> logout();
        return redirect('/') -> with('success', 'You have successfully Logged Out!');
    }
}
