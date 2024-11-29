<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    use HasFactory;
    protected $table="accesorios";
    protected $primaryKey="id";
    protected $fillable=['codigo','nombre', 'foto', 'descripcion'];
    protected $hidden=['id'];
}
