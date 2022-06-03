<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaCorriente extends Model
{
    use HasFactory;
    protected $table = 'cuenta_corriente';
    protected $fillable = [
    'banco_id', 
    'saldo',
    'proveedor_id',
    ];
    public function banco()
    {
        return $this->hasOne('App\Models\Banco');
    }
    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor');
    }
}
