<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id)
    {
        $is_Me = Auth::id() === (int) $id;
        $user  = User::find($id);
        return view('user', compact('user', 'is_Me'));
    }
}
