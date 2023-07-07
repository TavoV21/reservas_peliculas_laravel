<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        if (auth()->attempt(request(['email','password'])) == false) {    
            return back()->withErrors([
                'message' => 'Email o contraseña incorrectos'
            ]);
        }else {
            if (auth()->user()->role == 'admin') {
                return redirect()->to('/admin');
            }else{
                return redirect()->to('/movies');

            }
        }

        
    }

    public function destroy(){

        auth()->logout();

        return redirect()->to('/');
    }
}
