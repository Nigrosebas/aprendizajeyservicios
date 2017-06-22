<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class AlumnoProyecto extends Model
{
    
	public $table = "alumnoProyectos";
    

	public $fillable = [
	    "id_proyecto",
		"rut",
		"rol",
        "nombre",
        "nombre_proyecto"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_proyecto" => "integer",
		"rut" => "integer",
		"rol" => "string"
    ];

	public static $rules = [
	    
	];

	public function Alumno()
    {
        return $this->belongsTo('App\Models\Alumno','rut_alumno');
    }
    public function Project()
    {
        return $this->hasMany('App\Models\Project','id','id_proyecto');
    }
}
