<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(Request $req){
        $check = $req->only(["name", "password"]);

        if(Auth::attempt($check)){
            $req->session()->regenerate();
            $token = $req->user()->createToken("token");
            return response()->json($token->plainTextToken);
        }

        return response()->json(["message" => "正しくありません"]);
        
    }
    public function logout(Request $req){
        // tokenとtokensで間違えた
        $req->user()->tokens()->delete();
        $req->session()->flush();
        return response()->json(["message" => "ログアウト完了しました"]);
    }
}
