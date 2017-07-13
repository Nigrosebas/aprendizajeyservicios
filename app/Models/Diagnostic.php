<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Diagnostic extends Model
{
    
	public $table = "diagnostics";
    

	public $fillable = [
	    "id_project",
		"rut",
		"pregunta1",
		"pregunta2",
		"pregunta3"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "pregunta1" => "string",
		"preguntar2" => "string",
		"pregunta3" => "string"
    ];

	public static $rules = [
	    
	];

}
