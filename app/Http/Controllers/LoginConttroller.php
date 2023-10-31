<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginConttroller extends Controller
{
   public function index(){
    return view('login');
   }
   public function auth(Request $request){
    $credential = $request->validate([
        'name' => 'required|max:100',
        'password' => 'required|min:5|max:20'
    ]);

    if(Auth::attempt($credential)){
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
    return back()->with('error','Username or password are wrong');
   }
   public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
   }
}
