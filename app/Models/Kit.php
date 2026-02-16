<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'project', 'active'];

    public function products()
    {
        return $this->hasMany(KitProducts::class, 'kit_id', 'id');
    }
}
