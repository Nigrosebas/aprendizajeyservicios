<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class University extends Model
{
    
	public $table = "universities";
    

	public $fillable = [
	    "nombre_u"
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

	public function Coordinador()
    {
        return $this->belongsTo('App\Models\Coordinador', 'id','id_university');
    }
    public function Profesor()
    {
        return $this->belongsTo('App\Models\Profesor', 'id','id_university');
    }
    public function Cursos()
    {
        return $this->hasMany('App\Models\Course', 'id','id_university');
    }

}
