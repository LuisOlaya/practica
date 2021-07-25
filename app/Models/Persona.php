<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'descripcion'
    ];

    public function casas()
    {
        return $this->hasMany(Casa::class);
    }

    public function direcciones() {
        return $this->belongsToMany(Direccion::class);
    }
}
