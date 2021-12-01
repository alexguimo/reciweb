<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peticiones extends Model
{
    //use HasFactory;

    protected $table = 'peticiones';
    protected $primaryKey = 'idpeticiones';
    protected $fillable = ['idpeticiones', 'cant_bolsas', 'peticion', 'estado_peticion', 'comentarios', 'puntospeticiones', 'pesopeticiones', 'hogar_id'];

}
