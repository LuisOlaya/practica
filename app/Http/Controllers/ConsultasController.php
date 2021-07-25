<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Persona;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function basic(Request $request, Persona $persona) {
        /* $caso = 0;
        if ($request->has('caso')) {
            $caso = $request->caso;
        }
        return $caso; */
        // $p = Persona::where('id', $persona->id)->get();
        // $p = Persona::with('casas', 'direcciones')->get();
        $p = Direccion::select('name')->whereHas('personas' , function ($personas) use ($persona){
            $personas->where('id', $persona->id);
        })->with('personas.casas')->get()
        /* ->pluck('personas')
        ->collapse()
        ->pluck('casas')
        ->collapse() */
        ;


        return $this->success($p);
    }
}
