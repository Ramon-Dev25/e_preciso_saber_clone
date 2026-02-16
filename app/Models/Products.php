<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    // Nome da tabela (opcional, só se quiser sobrescrever)
    protected $table = 'products';

    // Colunas que podem ser preenchidas em massa (mass assignment)
    protected $fillable = [
        'image_file',
        'image_url',
        'title',
        'subtitle',
        'isbn',
        'age_group',
        'publisher',
        'type',
        'author',
        'height',
        'width',
        'length',
        'weight',
        'synopsis',
    ];

    // Casts automáticos (para números decimais, datas, etc.)
    protected $casts = [
        'height' => 'decimal:2',
        'width' => 'decimal:2',
        'length' => 'decimal:2',
        'weight' => 'decimal:2',
    ];

    public function kits()
    {
        return $this->belongsToMany(Kit::class, 'kit_product')
            ->withPivot('quantity')
            ->withTimestamps();
    }

}
