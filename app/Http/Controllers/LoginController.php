<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        return view("login");
    }


    public function login(Request $req){
        // $req->validate([
        //     "name" => "required",
        //     "password" => "required",
        // ]);

        $check = $req->only(["name", "password"]);

        if(Auth::attempt($check)){
            $req->session()->regenerate();
            return redirect(route("home"));
        }

        return redirect(route("login"))->with(["message" => "名前またはパスワードが正しくありません"]);
        
    }
    public function logout(Request $req){
        Auth::logout();
        $req->session()->flush();
        return redirect(route("login"));
    }
}
