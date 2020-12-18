<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'codigo',
        'nombre',
        'precio',
        'medida',
        'categorias_id',
        'descripcion_corta',
        'descripcion_larga',        
        'destacados',
        'stock',
        'slug',
        'imagen1',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

//Relación con la tabla Pedidos
   public function Detalle_Pedido()
    {
        return $this->belongsToMany('App\Models\Detalle_Pedido','articulos_id','id');
    }
//Relación con la tabla Categorías
    public function Atributos()
    {
        return $this->hasMany('App\Models\Atributo','articulos_id','id');
    }	
//Relación con la tabla Medidas
	public function Categoria()
    {
        return $this->hasOne('App\Models\Categoria','id','categorias_id');
    }

    public function scopeNombre($query, $nombre){ 

        if($nombre){
         return $query->where('nombre','LIKE',"%$nombre%");
        }
    }

}