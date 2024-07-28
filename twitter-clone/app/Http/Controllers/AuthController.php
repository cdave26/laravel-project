<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        // dd(request()->all());
         $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed'
            ]
         );

         $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
         );

         Mail::to($user->email)->send(new WelcomeEmail($user));

         return redirect()->route('register')->with('success', 'account created successfully');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){

         $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
         );

         if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login Successfully');
         }

         return redirect()->route('login')->withErrors([
            "email" => "no matching user"
         ]);

        
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
 
        return redirect()->route('dashboard')->with('success', 'Logout Successfully');
    }

    public function forgotPassword(){
        // check email if existing
        // if email is existing then redirect to change password field
        // enter new password and update the new password
 
       return view('auth.forgot-password');
    }

  public function updatePassword(){
        $validated = request()->validate([
            'email' => 'required|email', 
            'password' => 'required|confirmed'
        ]);

        $user = DB::table('users')->where('email', $validated['email'])->first();
  
        if ($user) {
        DB::table('users')
                ->where('email', $validated['email'])
                ->update(['password' => Hash::make($validated['password'])]);

            return view('auth.login')->with('success', 'User Updated Successfully');
        } else {
            return view('auth.login')->with('error', 'User Not Existing');
        }
   }
}
