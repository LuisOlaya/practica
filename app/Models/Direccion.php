<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'descripcion'
    ];

    public function personas() {
        return $this->belongsToMany(Persona::class);
    }
}
