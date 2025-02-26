<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {

        $attribute = request()->validate(
            [
                'name' => 'required',
                'username' => 'required|max:255|min:4|unique:users,username',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required'
            ]
        );

        $user = User::create($attribute);

        auth()->login($user);

        return redirect("/")->with("success", "Your account has been created");

    }
}
