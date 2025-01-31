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
        return $dataTable->render('welcome');
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
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user->update($attr);

        return redirect('/')->with('success', "User data has been Updated");
    }
    public function delete(User $user)
    {
        $user->delete();
        return back()->with('success', 'User data has been deleted');
    }
}
