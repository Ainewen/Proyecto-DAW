<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'users_id',
        'iva',
        'total',
        'direccion_envio',
        'codigopostal',
        'poblacion',
        'fecha',
        'forma_pago_id',
        'gastos_envio',
        'estado_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];
//Relación con la tabla articulos
   public function Detalle_Pedido()
    {
    return $this->hasMany('App\Models\Detalle_Pedido','id','pedidos_id');
    }

//Relación con la tabla Users
   public function User()   
   {
    return $this->belongsTo('App\Models\User','users_id','id');
   }

//Relación con la tabla Forma_pagos
public function Forma_pago()
    {
        return $this->hasOne('App\Models\Forma_pago','id','forma_pago_id');
    }

//Relación con la tabla Estados
public function Estado()
    {
        return $this->hasOne('App\Models\Estado','id','estado_id');
    }       

}