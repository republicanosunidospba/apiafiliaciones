<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afiliados extends Model
{
    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['Matricula', 'Apellidos', 'Nombres', 'Profesion', 'FechaNacimiento', 'LugarNacimiento', 'Sexo', 'EstadoCivil', 'Domicilio', 'Provicia', 'Localidad', 'Departamento', 'Municipio', 'Telefono', 'Email', 'FechaSolicitud', 'EstadoAfiliacion'];

    protected $table = 'afiliados';
}

