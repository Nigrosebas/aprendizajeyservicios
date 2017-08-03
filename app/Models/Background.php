<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Background extends Model
{
    
	public $table = "backgrounds";
    

	public $fillable = [
	    "id_university",
		"code_background"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_university" => "integer",
		"code_background" => "string"
    ];

	public static $rules = [
	    
	];

}
