<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request){
        dd('Chegou');
        return $request->all();
    }
}
