<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuario extends Model implements AuthenticatableContract,
                                       AuthorizableContract
{
    
	public $table = "usuarios";
	use Authenticatable, Authorizable;
    

	public $fillable = [
	    "rut",
		"rol",
		"usuario",
		"password"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "rut" => "string",
		"rol" => "string",
		"usuario" => "string",
		"password" => "string"
    ];

	public static $rules = [

	 "rut" => "required|unique:usuarios",
	 "rol" => "required",
	 "usuario" => "required",
	 "password" => "required",
	    
	];

	public function Alumno()
    {
        return $this->hasOne('App\Models\Alumno','rut_alumno','rut');
    }

    public function Profesor()
    {
        return $this->hasOne('App\Models\Profesor','rut_profesor','rut');
    }
    public function Coordinador()
    {
        return $this->hasOne('App\Models\Coordinador','rut_coordinador','rut');
    }
}