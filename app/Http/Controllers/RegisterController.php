<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    public function add(Request $request){
          $ValidatedData= $request->validate([
                    'name' => 'required|max:100',
                    'password' => 'required|min:5|max:20'
                ]);
                User::create($ValidatedData);
                return redirect('/login');
    }
}
