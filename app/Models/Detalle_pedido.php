<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_pedido extends Model
{
    
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pedidos_id',
        'articulos_id',
        'cantidad',
        'descuento',
        'precio_und',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    public function Pedido()   
   {
    return $this->belongsTo('App\Models\Pedido','pedidos_id','id');
   }
   public function Articulo()   
   {
    return $this->hasMany('App\Models\Articulo','id','articulos_id');
   }
}