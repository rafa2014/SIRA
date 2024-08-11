<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
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
        'clave',
        'id_usuario'
    ];

    /**
     * Get the user that owns the empleado.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
