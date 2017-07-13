<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Project extends Model
{
    
	public $table = "projects";
    

	public $fillable = [
	    "id_profesor",
		"id_university",
		"year",
		"id_course",
		"porcentaje",
		"objalcanzados",
		"resumen",
		"objetivos",
		"resultados",
		"conclusion",
		"alumnos_table",
		"project_name",
		"estado",
		"complejidad",
		"duracion",
		"evaluaciones",
		"otras_evaluaciones"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_profesor" => "integer",
		"id_university" => "string",
		"year" => "string",
		"id_course" => "string",
		"alumnos_table" => "string"
    ];

	public static $rules = [
	    
	];

	public function Profesor()
    {
        return $this->belongsTo('App\Models\Profesor', 'id_profesor');
    }
	public function Alumnoproyecto()
    {
    return $this->hasMany('App\Models\AlumnoProyecto', 'id_proyecto');
	}

}
