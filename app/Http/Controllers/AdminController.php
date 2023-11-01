<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function createUser()
    {
        return view("createUser");
    }
    public function storeUser(Request $req)
    {
        // dd($req->name);
        $req->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required|confirmed",
        ]);

        $user = User::create([
            "name" => $req->name,
            "email" => $req->email,
            "password" => $req->password,
        ]);

        return redirect(route("admin.createUserForm"))->with(["message" => "登録完了しました"]);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect(route("home"))->with(["message" => "ユーザーを削除しました"]);
    }


    public function editUser($id){
        $user = User::find($id);
        return view("editUser", compact("user"));
    }

    public function updateUser(Request $req, $id){
        $req->validate([
            "name" => "required",
            "email" => "required|email",
        ]);

        $user = User::find($id);

        $user->update([
            "name" => $req->name,
            "email" => $req->email,
            "is_active" => $req->is_active == "on" ? true : false
        ]);

        return redirect(route("admin.editUser", $user->id))->with(["message" => "登録完了しました"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view("showUser", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
