<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hogaradmin extends Model
{
    use HasFactory;
    
    protected $table = 'hogars';
    protected $primaryKey = 'idhogar';
    protected $fillable = ['idhogar', 'id_hogar', 'puntos', 'direccion', 'ciudad', 'puntos_ultimo_reciclado', 'peso_ultimo_reciclado', 'total_peso_reciclado', 'user_id'];

}
