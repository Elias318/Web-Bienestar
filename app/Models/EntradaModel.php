<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntradaModel extends Model
{
    protected $table = "entradas";
    protected $primaryKey = "id_entrada";

    public $timestamps = false;
    protected $fillable = ["titulo_entrada" , "descripcion_entrada" , "imagenDestacada","galeria","fecha_creacion","categoria_id"];


    public function categoria():BelongsTo{
        return $this->belongsTo(CategoriaModel::class,'categoria_id','id_categoria');
    }
}
