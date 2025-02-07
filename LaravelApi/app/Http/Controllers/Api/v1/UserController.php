<?php
namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return "Hello, This is API version 1";
    }
    public function show()
    {
        return User::latest()->get();
    }
}
