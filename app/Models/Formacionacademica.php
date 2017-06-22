<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Formacionacademica extends Model
{
    
	public $table = "formacionacademicas";
    

	public $fillable = [
	    "id_alumno",
		"periodo",
		"nivel",
		"institucion",
		"nombre",
		"estado"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_alumno" => "integer",
		"periodo" => "string",
		"nivel" => "string",
		"institucion" => "string",
		"nombre" => "string",
		"estado" => "string"
    ];

	public static $rules = [
	    
	];

	public function Alumno()
    {
        return $this->belongsTo('App\Models\Alumno','id_alumno');
    }

}
