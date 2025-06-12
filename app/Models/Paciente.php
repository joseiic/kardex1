<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Paciente extends Model
{
    public function sector()
{
    return $this->belongsTo(Sector::class, 'id_sector');
}

public function nacionalidad()
{
    return $this->belongsTo(Nacionalidad::class, 'id_nacionalidad');
}

public function puebloOriginario()
{
    return $this->belongsTo(PuebloOriginario::class, 'id_pueblo_originario');
}

public function previcion()
{
    return $this->belongsTo(Previcion::class, 'id_previcion');
}

public function familia()
{
    return $this->belongsTo(Familia::class, 'cod_familia', 'cod_familia');
}
    use HasFactory;
    protected $fillable = [
    'rut_paciente',
    'nombre',
    'apellido_paterno',
    'apellido_materno',
    'sexo',
    'fecha_nacimiento',
    'num_ficha',
    'estado',
    'id_sector',
    'id_nacionalidad',
    'id_pueblo_originario',
    'id_previcion',
    'cod_familia',
];

}

