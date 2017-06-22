<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;
use Validator;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usuario' => 'required|max:255|unique:usuario',
            'password' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected $redirectAfterLogout = 'inicio';
    public function getLogin()
    {
       return view('auth.login');
    }

    public function postLogin(Request $request)

    {
            $input = $request->all();
        //$usuario=Usuario::where('usuario',$request->usuario)->first();
        if (Auth::attempt(['usuario' => $input['usuario'], 'password' => $input['password']])) 
        {
            $usuario=Usuario::where('usuario',$request->usuario)->first();
                return redirect('inicio');

        }   
        else{
            Flash::error('Datos erróneos');
            return redirect('auth/login');

        }  
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('inicio');

    }
}
