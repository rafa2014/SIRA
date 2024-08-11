<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validacion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'id_expediente',
        'fecha_validacion',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'validaciones';

    /**
     * Get the user that owns the validation.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
     * Get the expediente that owns the validation.
     */
    public function expediente()
    {
        return $this->belongsTo(Expediente::class, 'id_expediente');
    }
}
