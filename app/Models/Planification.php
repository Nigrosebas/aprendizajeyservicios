<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Planification extends Model
{
    
	public $table = "planifications";
    

	public $fillable = [
	    "id_project",
		"rut",
		"pregunta1",
		"pregunta2"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "pregunta1" => "string",
		"pregunta2" => "string"
    ];

	public static $rules = [
	    
	];

}
