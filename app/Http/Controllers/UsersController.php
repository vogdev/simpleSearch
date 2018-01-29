<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
 public function index()
    {
        return view('users.index');
    }
    public function getusers()
    {
        $users = User::orderBy('created_at','desc')->get();
        return $users;
    }
    public function search($query)
    {
        $user = User::where('name', $query)->orWhere('email', $query)->first();
        return $user;
    }
}
