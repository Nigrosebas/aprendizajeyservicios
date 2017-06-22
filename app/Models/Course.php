<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Course extends Model
{
    
	public $table = "courses";
    

	public $fillable = [
	    "id_university",
		"nombre_carrera"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

	public static $rules = [
	    
	];

	public function Universidad()
    {
        return $this->belongsTo('App\Models\University', 'id','id_university');
    }

}
