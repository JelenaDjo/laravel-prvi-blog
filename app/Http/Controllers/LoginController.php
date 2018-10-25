<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct ()
    {
        $this->middleware('guest', ['except'=>'logout']); // midl proverava da li je gost, a onda exept kaze da ne primeni midl ako je korisnik logout
    }

    public function index()
    {
        return view('login.index');
    }
    public function login()

    {
        if(!auth()->attempt(request(['email', 'password']))) { //attempt proverava da li u bazi vec postoji korisnik sa tim emailom ili passwordom){
            return back()->withErrors([
                'message'=> 'Nece da moze prijatelju!'
            ]);
        }
            return redirect ('/posts');
    }
    
    public function logout()
    {
        auth()->logout();
        return redirect('/posts');
    }
}
