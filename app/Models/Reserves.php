<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserves extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['image','title','description','id_categorie','id_movie','id_user'];

}