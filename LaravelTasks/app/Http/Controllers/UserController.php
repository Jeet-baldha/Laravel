<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function home()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        $attr = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'

        ]);

        $user = User::create($attr);

        return redirect('/users')->with('success', 'New user added :' . $user->full_name);

    }

    public function edit(User $user)
    {
        return view('users.edit', [
            "user" => $user
        ]);
    }

    public function update(User $user)
    {
        $attr = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email'
        ]);

        $user->update($attr);

        return redirect('/users')->with('success', "User data has been Updated");
    }
    public function delete(User $user)
    {
        $user->delete();
        return back()->with('success', 'User data has been deleted');
    }
}
