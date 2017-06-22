<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Idioma extends Model
{
    
	public $table = "idiomas";
    

	public $fillable = [
	    "id_alumno",
		"idioma",
		"lectura",
		"escritura",
		"conversacion"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_alumno" => "integer",
		"idioma" => "string",
		"lectura" => "string",
		"escritura" => "string",
		"conversacion" => "string"
    ];

	public static $rules = [
	    
	];
	public function Alumno()
    {
        return $this->belongsTo('App\Models\Alumno','id_alumno');
    }

}
