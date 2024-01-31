<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Http\Request;


// https://kinsta.com/blog/laravel-authentication/

use App\Models\User;
class RegisterController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view("Auth.register");
    }

    public function store(Request $request)
    {

        $request->validate([
            "username" =>"required",
            "email"=> "required|email|unique:users",
            "password"=> "required|confirmed|min:8",
            "types" =>"required"
        ]);

        $user = User::create([
            "username"=> $request->username,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
            "type"=> $request->types,
            ]);
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);

    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {

    }
    public function destroy(string $id)
    {
    
    }
}
