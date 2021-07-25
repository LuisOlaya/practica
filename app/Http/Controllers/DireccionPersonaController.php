<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Persona;
use Illuminate\Http\Request;

class DireccionPersonaController extends Controller
{
    public function add(Direccion $direccion, Persona $persona) {
        $persona->direcciones()->attach($direccion->id);
        return $this->success($persona);
    }

    public function remove(Direccion $direccion, Persona $persona) {
        $persona->direcciones()->detach($direccion->id);
        return $this->success($persona);
    }
}
