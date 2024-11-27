<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    use HasFactory;
    protected $table="filtros";
    protected $primaryKey="id";
    protected $fillable=['codigo','nombre', 'cantidad', 'velocidad','areafiltrado','diametro'];
    protected $hidden=['id'];
}
