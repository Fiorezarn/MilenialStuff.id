<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function show(){
        $user = Auth::user();
        return view('view_profile', compact('user'));
    }
    public function edit_page(){
        $user = Auth::user();
        return view('editprofile', compact('user'));
    }    
    public function update_profile(Request $request){
        $request->validate([
            'name'=> 'required|max:50',
            'email'=> 'required|email|email',
            'phonenumber'=> 'required|max:15',
            'password'=> 'min:8',
            'confirm'=> 'same:password',
        ]);

        $user = User::all()->find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        if ($request->input('password') != null){
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('home')->with('alert', 'Profile successful updated.');
    }
}
