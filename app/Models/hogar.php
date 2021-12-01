<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class hogar extends Model
{
    use HasFactory;

    protected $table = 'hogars';
    protected $primaryKey = 'idhogar';
    protected $fillable = ['idhogar', 'id_hogar', 'puntos', 'direccion', 'puntos_ultimo_reciclado', 'peso_ultimo_reciclado', 'total_peso_reciclado', 'user_id'];

}
