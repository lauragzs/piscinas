<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_accesorio extends Model
{
    use HasFactory;
    protected $table="detalle_accesorio";
    protected $primaryKey="id";
    protected $fillable=['cantidad','accesorio_id', 'piscina_id'];
    protected $hidden=['id'];

    public function piscina(){
        return $this->belongsToMany(Factura::class, 'detalle_accesorio');
    }
}
