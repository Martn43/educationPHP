<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table='marcas'; // Porque se asume que el nombre es 'class'+'s'
    protected $primaryKey = 'idMarca'; // Porque se asume que es $id
    public $timestamps = false; // Porque se agregan 2 columnas created_at y updated_at, esto las desactiva.

}
