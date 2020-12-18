<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'sku',
        'articulos_id',
        'medida',
        'precio',
        'stock'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
//Relación con la tabla Artículos
   public function Articulos()
    {
        return $this->belongsToMany('App\Models\Articulo','id','articulos_id');
    }
   
}