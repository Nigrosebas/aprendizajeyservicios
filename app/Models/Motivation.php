<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Motivation extends Model
{
    
	public $table = "motivations";
    

	public $fillable = [
	    "id_project",
		"rut",
		"pregunta1",
		"pregunta2",
		"pregunta3",
		"pregunta4"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_project" => "integer",
		"rut" => "integer",
		"pregunta1" => "string",
		"pregunta2" => "string",
		"pregunta3" => "string",
		"pregunta4" => "string"
    ];

	public static $rules = [
	    
	];

}
