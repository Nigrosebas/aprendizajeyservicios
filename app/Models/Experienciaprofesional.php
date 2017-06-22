<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Experienciaprofesional extends Model
{
    
	public $table = "experienciaprofesionals";
    

	public $fillable = [
	    "id_alumno",
		"periodo",
		"empresa",
		"pais",
		"ciudad",
		"cargo",
		"contactoempresa",
		"urlempresa"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_alumno" => "string",
		"periodo" => "string",
		"empresa" => "string",
		"pais" => "string",
		"ciudad" => "string",
		"cargo" => "string",
		"contactoempresa" => "string",
		"urlempresa" => "string"
    ];

	public static $rules = [
	    
	];

	public function Alumno()
    {
        return $this->belongsTo('App\Models\Alumno','id_alumno');
    }

}
