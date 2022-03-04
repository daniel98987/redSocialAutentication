<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class redSocial extends Controller
{
    public function getAmigos()
    {
       // $movie= new Movie;
   		 $usuarios=  User::all();
    
         return view('amigos',array('usuarios'=>$usuarios));
    }
}
