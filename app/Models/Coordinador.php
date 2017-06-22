<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Coordinador extends Model
{
    
	public $table = "coordinadors";
    

	public $fillable = [
		"nombre",
	    "rut_coordinador",
		"email",
		"telefono",
		"id_university"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    	"nombre" => "string",
        "rut_coordinador" => "string",
		"email" => "string",
		"telefono" => "string"
    ];

	public static $rules = [
	    
	];

	public function Universidad()
    {
        return $this->hasOne('App\Models\University','id','id_university');
    }
    	public function Usuario()
    {
        return $this->belongsTo('App\Models\Usuario','rut_coordinador','rut');
    }

}
