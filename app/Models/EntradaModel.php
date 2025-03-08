<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntradaModel extends Model
{
    protected $table = "entradas";
    protected $primaryKey = "id_entrada";

    public $timestamps = true;
    protected $fillable = ["titulo_entrada" , "descripcion_entrada" , "imagenDestacada","fecha_creacion"];
}
