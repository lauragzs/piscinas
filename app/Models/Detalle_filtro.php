<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_filtro extends Model
{
    use HasFactory;
    protected $table="detalle_filtro";
    protected $primaryKey="id";
    protected $fillable=['cantidad','filtro_id', 'piscina_id'];
    protected $hidden=['id'];

    public function piscina(){
        return $this->belongsToMany(Factura::class, 'detalle_filtro');
    }
}
