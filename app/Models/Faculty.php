<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Faculty extends Model
{
    
	public $table = "faculties";
    

	public $fillable = [
	    "id_university",
		"nombre_facultad"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_university" => "string",
		"nombre_facultad" => "string"
    ];

	public static $rules = [
	    
	];

	public function Universidad()
    {
        return $this->belongsTo('App\Models\University','id','id_university');
    }
    public function Course()
    {
        return $this->hasMany('App\Models\Course', 'id','id_university');
    }

}
