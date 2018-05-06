<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the specified resource.
     *

     */
    public function show()
    { 
        $user=auth()->user();
        return view('auth.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
 
     */
    public function edit()
    {
        $user=auth()->user();
        return view('auth.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated=$request->validate( 
            [
                'name' => "required|string|min:2|max:255|regex:/^[a-zA-Z . ,'`-]+$/",
                'surname' => "required|string|min:2|max:255|regex:/^[a-zA-Z . ,'`-]+$/",
                'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
            ],
            [
                'name.regex' => "Name invalid format, may contain only letters ,.'-` ",
                'surname.regex' => "Surname invalid format, may contain only letters ,.'-` ",
            ]
        );

        auth()->user()->update($validated);
        $alert=['variant' => 'success' , 'title' => 'User Profile Updated' , 'message' => 'Your Carbe User Profile has been successfuly updated'];
        return redirect('dashboard')->with('alert',$alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
     
        auth()->user()->delete();
        
        $alert=['variant' => 'warning' , 'title' => 'Your Account has been DELETED' , 'message' => 'Your Account has been successfuly deleted'];
        return redirect()->route('home')->with('alert',$alert);
    }

    public function showChangePassword(Request $request){

        return view('auth.passwords.change');

    }

    public function changePassword(Request $request){
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|max:255|confirmed',
        ]);
        $user=auth()->user();

        if (! Hash::check( request('current_password'), $user->password)) {
            return back()->withErrors(['current_password'=> 'Curent stored password does not match with entered password']);
        }

        if(strcmp($request->current_password , $request->password) == 0){
            return back()->withErrors(['password'=> 'New password can not be the same as the current password']);
        }

        $user->password=Hash::make($request->password);
        $user->save();

        $alert=['variant' => 'success' , 'title' => 'Password Successfuly Changed' , 'message' => 'Your Password has been successfuly changed'];
        return redirect('dashboard')->with('alert',$alert);

    }
}
