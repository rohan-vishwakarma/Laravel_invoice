<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User as UserModel;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function create()
    {
       
        return view("Auth.Login");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'email' =>'required',
                'password'=> 'required'
            ]);
    
            $userid = UserModel::where('email', $request->email)->first();
            
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $request->session()->put('email', $request->email);
                $request->session()->put('user_id', $userid->id);
                return redirect()->intended('/dashboard');
            }
        
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]); 
        } catch (\Throwable $th) {
            
            return redirect()->route('internalservererror');
        }
        
    }

    /**
     * Display the specified resource.
     */
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
