<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerController extends Controller
{
    public function index($id ) {
        return "Hola Mundo".$id;
    }
}
