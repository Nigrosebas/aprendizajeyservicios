<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Profesor extends Model
{
    
	public $table = "profesors";
    

	public $fillable = [
		"nombre",
	    "rut_profesor",
		"email",
		"telefono",
		"foto_perfil",
		"id_university"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
        "rut_profesor" => "string",
		"email" => "string",
		"telefono" => "string",
		"foto_perfil" => "string",
        "id_university" => "string"
    ];

	public static $rules = [
	    
	];

	public function Usuario()
    {
        return $this->belongsTo('App\Models\Usuario','rut_profesor','rut');
    }

    public function Universidad()
    {
        return $this->hasOne('App\Models\University','id','id_university');
    }

    public function Project()
    {
        return $this->hasMany('App\Models\Project','id_profesor','id');
    }
}
