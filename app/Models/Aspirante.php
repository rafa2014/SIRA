<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirante extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido_uno',
        'apellido_dos',
        'fecha_nacimiento',
        'escuela_procedencia',
        'nivel_escolaridad',
        'titulo_descripcion',
        'curp',
        'id_usuario',
        'num_whatsapp',
        'num_telefono'
    ];

    /**
     * Get the user that owns the aspirante.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
