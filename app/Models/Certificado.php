<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Certificado extends Model
{
    
	public $table = "certificados";
    

	public $fillable = [
	    "id_alumno",
		"certificadora",
		"certificado",
		"fecha",
		"observacion"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_alumno" => "integer",
		"certificadora" => "string",
		"certificado" => "string",
		"fecha" => "string",
		"observacion" => "string"
    ];

	public static $rules = [
	    
	];

	public function Alumno()
    {
        return $this->belongsTo('App\Models\Alumno','id_alumno');
    }

}
