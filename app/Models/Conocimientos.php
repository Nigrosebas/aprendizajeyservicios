<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Conocimientos extends Model
{
    
	public $table = "conocimientos";
    

	public $fillable = [
	    "id_alumno",
		"conocimiento",
		"nivel",
		"comentario"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_alumno" => "integer",
		"conocimiento" => "string",
		"nivel" => "string",
		"comentario" => "string"
    ];

	public static $rules = [
	    
	];
	public function Alumno()
    {
        return $this->belongsTo('App\Models\Alumno','id_alumno');
    }
}
