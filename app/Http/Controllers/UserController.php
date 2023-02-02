<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['department'])->get();
//        return $users;
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }
}
