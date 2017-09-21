<?php

namespace PJD;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
	protected $table='personas';

	protected $primaryKey="id";

    protected $fillable = [
    	'cedula', 
    	'nombre', 
    	'apellido', 
    	'edad', 
    	'remera', 
    	'email', 
    	'foto', 
    	'fotopermiso', 
    	'animador', 
    	'miembrocj', 
    	'dinamizador', 
    	'experiencia', 
    	'zona', 
    	'aprobado', 
    	'localidads_id', 
    ];

    public function localidad() {
        return $this->belongsTo('App\Localidad');
    }
}
