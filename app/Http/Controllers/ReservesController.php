<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserves;
use App\Models\Movies;

class ReservesController extends Controller
{
    public function index(){
        $id_user = auth()->user()->id;

         $reserves = Reserves::join('categories','categories.id','=','reserves.id_categorie')
                            ->select('reserves.id','reserves.image','reserves.title','reserves.description','reserves.id_movie','categories.name')
                            ->where('reserves.id_user','=', $id_user)
                            ->get();

        return view('layouts.reserves',compact('reserves'));   
     }

     public function store(string $id_movie,string $image, string $title, string $id_categorie, string $description, string $status){

        $id_user = auth()->user()->id;
        $reserve = new Reserves();
        $reserve->image = $image;
        $reserve->title = $title;
        $reserve->description = $description;
        $reserve->id_categorie = $id_categorie;
        $reserve->id_movie = $id_movie;
        $reserve->id_user = $id_user;
        $reserve->save();

        $movie = Movies::findOrFail($id_movie);
        $movie->status = 'Reservado';
        $movie->save();

        return redirect()->to('/reserves');

     }

     public function destroy(string $id, string $idMovie){
         $reserve = Reserves::find($id);
         $reserve->delete();

         $movie = Movies::findOrFail($idMovie);
         $movie->status = 'No reservado';
         $movie->save();

         return redirect()->to('/movies');

     }

    

   
}
