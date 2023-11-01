<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Request $req)
    {
        $user = $req->user();
        return response()->json([
            "name" => $user->name,
            "created_at" => $user->created_at
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req)
    {
        $user = User::find($req->user()->id);
        $user->update([
            "name" => $req->name,
        ]);
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req)
    {
        $user = User::find($req->user()->id);
        $user->delete();
        return response()->json("OK");
    }
}
