<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piscina extends Model
{
    use HasFactory;
    protected $table="piscinas";
    protected $primaryKey="id";
    protected $fillable=['cliente', 'pais', 'telefono','profundidad','largo','ancho','longitud'];
    protected $hidden=['id'];
}
