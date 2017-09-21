<?php

namespace PJD;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    //
	protected $table='localidads';

	protected $primaryKey="id";

    protected $fillable = [
    	'ciudad_parroquia',
    	'condicion'
    ];
    
    public function user(){
        return $this->hasMany('App\Persona');
    }

}
