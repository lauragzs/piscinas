<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piscina extends Model
{
    use HasFactory;
    protected $table="piscinas";
    protected $primaryKey="id";
    protected $fillable=['nombrep','cliente', 'pais', 'telefono','tipo','profundidad','largo','ancho','longitud','area','perimetro','volumen','tipologia','caudal','succion','impulsion'];
    protected $hidden=['id'];
}
