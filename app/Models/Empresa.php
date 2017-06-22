<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Empresa extends Model
{
    
	public $table = "empresas";
    

	public $fillable = [
	    "rut_encargado",
		"nombre_encargado",
		"email_encargado",
		"telefono_encargado",
		"nombre_empresa",
		"clasificacion",
		"web",
		"pais",
		"region",
		"ciudad",
		"direccion"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "rut_encargado" => "string",
		"nombre_encargado" => "string",
		"email_encargado" => "string",
		"telefono_encargado" => "string",
		"nombre_empresa" => "string",
		"clasificacion" => "string",
		"web" => "string",
		"pais" => "string",
		"region" => "string",
		"ciudad" => "string",
		"direccion" => "string"
    ];

	public static $rules = [
	"rut_encargado" => "required",
	    
	];

	public function Usuario()
    {
        return $this->belongsTo('App\Models\Usuario','rut_encargado','rut');
    }
}
