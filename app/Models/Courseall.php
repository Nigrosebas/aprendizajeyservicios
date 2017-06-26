<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Courseall extends Model
{
    
	public $table = "coursealls";
    

	public $fillable = [
	    "nombre_carrera"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre_carrera" => "string"
    ];

	public static $rules = [
	    
	];

}
