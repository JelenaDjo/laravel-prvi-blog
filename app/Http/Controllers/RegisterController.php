<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()

    {
        $this->validate(
            request(),
        User::VALIDATION_RULES
        );
        $user=User::create(request()->all());
        auth()->login($user);
        return redirect('/posts');
    }
}
