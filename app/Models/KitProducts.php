<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kit;
use App\Models\Products;

class KitProducts extends Model
{
    protected $table = 'kit_product';

    protected $fillable = ['kit_id', 'product_id', 'quantity'];

    /**
    * RETORNA DADOS DOS ITENS
    */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function kit()
    {
        return $this->belongsTo(Kit::class, 'kit_id', 'id');
    }
}
