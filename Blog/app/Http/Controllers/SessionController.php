<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view('session.login');
    }

    public function store()
    {
        $attribute = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attribute)) {
            session()->regenerate();
            return redirect('/')->with('success', 'welcome back!');
        }


        throw ValidationException::withMessages(['email' => "Your provided creadential could not match"]);
    }
    public function destroy()
    {
        auth()->logout();

        return back()->with("success", "Good by!");
    }
}
