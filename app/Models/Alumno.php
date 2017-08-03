<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Alumno extends Model
{
    
	public $table = "alumnos";
    

	public $fillable = [
	    "rut_alumno",
	    "nombre",
		"fecha_nacimiento",
		"email",
		"id_university",
		"telefono",
		"region",
		"ciudad",
		"direccion",
		"foto_perfil",
		"licencia_conducir",
		"descripcion"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "rut_alumno" => "string",
		"fecha_nacimiento" => "string",
		"email" => "string",
		"telefono" => "string",
		"ciudad" => "string",
		"direccion" => "string",
		"foto_perfil" => "string",
		"licencia_conducir" => "string",
		"descripcion" => "string"
    ];

	public static $rules = [
	"rut_alumno" => "required",
	];

	public function Usuario()
    {
        return $this->belongsTo('App\Models\Usuario','rut_alumno','rut');
    }

    public function Formacionacademica()
    {
    return $this->hasMany('App\Models\Formacionacademica', 'id_alumno');
	}
	public function Certificado()
    {
    return $this->hasMany('App\Models\Certificado', 'id_alumno');
	}
	public function Idioma()
    {
    return $this->hasMany('App\Models\Idioma', 'id_alumno');
	}
	public function Experienciaprofesional()
    {
    return $this->hasMany('App\Models\Experienciaprofesional', 'id_alumno');
	}
	public function Alumnoproyecto()
    {
    return $this->hasMany('App\Models\AlumnoProyecto', 'rut');
	}
}
