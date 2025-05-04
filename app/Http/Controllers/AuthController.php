<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $req)
    {
        if ($req->isMethod("POST")) {
            $data = $req->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($data)) {
                return redirect()->route("homepage");
            } else {
                return back()->with("error", "Invalid email aur password");
            }
        }
        return view("login");

       
    }


    public function register(Request $req){
        if($req->isMethod("post")){
            $data = $req->validate([
                'name' => ["required", "string"],
                'email' =>["required", "email"],
                'password' =>["required"],
            ]);

            $user = User::create($data);
            return redirect()->route("login");
        }
        return view("register");
    }
}
