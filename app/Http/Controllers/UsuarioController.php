<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Libraries\Repositories\UsuarioRepository;
use App\Libraries\Repositories\AlumnoRepository;
use App\Libraries\Repositories\UniversityRepository;
use App\Libraries\Repositories\CoordinadorRepository;
use App\Libraries\Repositories\ProfesorRepository;
use App\Models\University;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use DB;

class UsuarioController extends AppBaseController
{

	/** @var  UsuarioRepository */
	private $usuarioRepository;
	private $alumnoRepository;
	private $universityRepository;
	private $coordinadorRepository;
	private $profesorRepository;

	function __construct(UsuarioRepository $usuarioRepo,AlumnoRepository $alumnoRepo,UniversityRepository $universityRepo ,CoordinadorRepository $coordinadorRepo,ProfesorRepository $profesorRepo)
	{
		$this->usuarioRepository = $usuarioRepo;
		$this->alumnoRepository = $alumnoRepo;
		$this->universityRepository = $universityRepo;
		$this->profesorRepository = $profesorRepo;
		$this->coordinadorRepository = $coordinadorRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Usuario.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = $this->usuarioRepository->paginate(10);

		return view('usuarios.index')
			->with('usuarios', $usuarios);
	}

	/**
	 * Show the form for creating a new Usuario.
	 *
	 * @return Response
	 */
	public function create()
	{
		$universidades = University::lists('nombre_u', 'id');
		return view('usuarios.create')->with('universidades',$universidades);
	}

	/**
	 * Store a newly created Usuario in storage.
	 *
	 * @param CreateUsuarioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUsuarioRequest $request)
	{
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);


		if($input['rol']=='Alumno'){

			$input2['rut_alumno'] = $input['rut'];
			$usuario = $this->usuarioRepository->create($input);
			$alumno = $this->alumnoRepository->create($input2);

		}
		if($input['rol']=='Profesor'){

			$input2['rut_profesor'] = $input['rut'];
			$input2['nombre']=$input['nombre'];
			$input2['id_university'] = $input['id_university'];
			$usuario = $this->usuarioRepository->create($input);
			$alumno = $this->profesorRepository->create($input2);

		}
		if($input['rol']=='Coordinador'){

			$input2['rut_coordinador'] = $input['rut'];
			$input2['nombre']=$input['nombre'];
			$input2['id_university'] = $input['id_university'];
			$usuario = $this->usuarioRepository->create($input);
			$alumno = $this->coordinadorRepository->create($input2);
		}


		Flash::success('Usuario registrado de forma correcta.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Display the specified Usuario.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado');

			return redirect(route('usuarios.index'));
		}
		$alumno = Usuario::find(1)->alumno;
		return view('usuarios.show')

		->with('usuario', $usuario)
		->with('alumno', $alumno);
	}

	/**
	 * Show the form for editing the specified Usuario.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado');

			return redirect(route('usuarios.index'));
		}

		return view('usuarios.edit')->with('usuario', $usuario);
	}

	/**
	 * Update the specified Usuario in storage.
	 *
	 * @param  int              $id
	 * @param UpdateUsuarioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateUsuarioRequest $request)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado');

			return redirect(route('usuarios.index'));
		}

		$this->usuarioRepository->updateRich($request->all(), $id);

		Flash::success('Usuario actualiado correctamente.');

		return redirect(route('usuarios.index'));
	}

	/**
	 * Remove the specified Usuario from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado');

			return redirect(route('usuarios.index'));
		}

		$this->usuarioRepository->delete($id);

		Flash::success('Usuario borrado correctamente.');

		return redirect(route('usuarios.index'));
	}
}
