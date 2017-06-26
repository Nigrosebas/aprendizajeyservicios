<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Course extends Model
{
    
	public $table = "courses";
    

	public $fillable = [
	    "id_university",
		"id_faculty",
		"name_course"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id_university" => "integer",
		"id_faculty" => "integer",
		"name_course" => "string"
    ];

	public static $rules = [
	    
	];

		public function Faculty()
    {
        return $this->belongsTo('App\Models\Faculty','id','id_faculty');
    }

}
