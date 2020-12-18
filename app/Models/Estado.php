<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

//Relación con la tabla Pedidos
   public function Pedido()
    {
        return $this->belongsTo('App\Models\Pedido','estado_id','id');
    }
   
}