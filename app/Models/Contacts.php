<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contacts extends Model
{
    use HasFactory;

    // Nome da tabela (opcional, pois o Laravel já entende "contacts" pelo plural)
    protected $table = 'contacts';

    // Campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'message',
        'institution',
        'segment',
        'status',
        'viewed',
    ];

    // Valores padrão (caso queira garantir no model também)
    protected $attributes = [
        'institution' => 'Não informado',
        'segment'    => 'Não informado',
        'status'     => 'novo',
        'viewed'     => false,
    ];
}
