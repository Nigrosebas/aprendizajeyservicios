<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Lenguaje extends Model
{
    
	public $table = "lenguajes";
    

	public $fillable = [
	    "nombre"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string"
    ];

	public static $rules = [
    "nombre" => 'required',
	    
	];

}
