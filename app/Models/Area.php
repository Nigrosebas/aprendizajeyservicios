<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Area extends Model
{
    
	public $table = "areas";
    

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
