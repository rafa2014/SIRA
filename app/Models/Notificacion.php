<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_aspirante',
        'titulo',
        'mensaje',
        'leida'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notificaciones';

    /**
     * Get the aspirante that owns the notification.
     */
    public function aspirante()
    {
        return $this->belongsTo(Aspirante::class, 'id_aspirante');
    }
}
