<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticaCreada extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'practicas_creadas';
    
    use HasFactory;
}