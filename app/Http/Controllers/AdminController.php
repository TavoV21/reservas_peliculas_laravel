<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;


class AdminController extends Controller
{
    public function index (){
        //return view('admin.admin');
        $categorie = Categorie::all();
        return view('admin.admin',compact('categorie')); 
    }

    public function store(){
        
    }

 
}
