<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    
    protected $fillable = [
        'image_file',
        'name',
        'days',
        'start_day',
        'address',
        'description',
        'page',
        'status',
        'active',
    ];

    protected $casts = [
        'page' => 'boolean',
        'active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
