<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forma_pago extends Model
{
    
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre',
        'imagen',
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
        return $this->belongsTo('App\Models\Pedido','forma_pago_id','id');
    }
   

}