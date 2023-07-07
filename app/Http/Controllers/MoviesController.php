<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\Categorie;
use App\Models\Reserves;


class MoviesController extends Controller
{
    public function index(){
        $movie = Movies::select('movies.id','image','title','description','id_categorie','status','name')
        ->join('categories','categories.id','=','movies.id_categorie')->get();

        return view('layouts.movies', compact('movie'));
    }

    public function store(Request $request){
        $nameImage = $request->image->getClientOriginalName();
        $movie = new Movies();
        $movie->image = $nameImage;
        $request->image->move(public_path('images'), $nameImage);
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->id_categorie = $request->id_categorie;
        $movie->status = 'No reservado';
        $movie->save();
        return redirect()->to('/movies');
    }

    public function show(string $id){
        $movie = Movies::find($id);
        $categorie = Categorie::all();
        return view('layouts.editMovie',compact('movie','categorie'));
    }

    public function update(Request $request, string $id){
        $movie = Movies::findOrFail($id);

        if ($request->hasFile('image')) {
            $nameImage = $request->image->getClientOriginalName();
            $movie->image = $nameImage;
            $request->image->move(public_path('images'), $nameImage);
        }    
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->id_categorie = $request->id_categorie;
        $movie->save();
        
        return redirect()->to('/movies');
    }

    public function destroy(string $id){
        $movie = Movies::find($id);
        $movie->delete();
        return redirect()->to('/movies');
    }

    

}