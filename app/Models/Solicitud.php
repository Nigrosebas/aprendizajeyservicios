<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Solicitud extends Model
{
    
	public $table = "solicituds";
    

	public $fillable = [
	    "nombre_empresa",
		"clasificacion",
		"ubicacion",
		"prioridad",
		"rut_encargado",
		"area",
		"nivel",
		"duracion",
		"requerido"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre_empresa" => "string",
		"clasificacion" => "string",
		"ubicacion" => "string",
		"prioridad" => "string",
		"rut_encargado" => "string",
		"area" => "string",
		"nivel" => "string",
		"duracion" => "string",
		"requerido" => "string"
    ];

	public static $rules = [
	    
	];

}
