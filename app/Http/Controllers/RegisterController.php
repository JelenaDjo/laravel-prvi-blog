<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('age', ['only'=>'store']); // jer je u kelnu imenovan tako
    }

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
        $user= new User();
        $user->name= request ('name');
        $user->email= request ('email');
        $user->password= bcrypt(request ('password')); // hesing passworda
        $user->save(); // ubacuje usera u bazu podataka


        
       // $user=User::create(request()->all());
        auth()->login($user);
        
        session()->flash('message', 'Hvala sto ste se registrovali!'); // php varijabla session je niz, u nju smo sad smestili poruku

        return redirect('/posts');
    }
}
