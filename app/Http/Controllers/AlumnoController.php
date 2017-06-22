<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Libraries\Repositories\AlumnoRepository;
use App\Libraries\Repositories\AlumnoProyectoRepository;
use Flash,Auth,Exception;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class AlumnoController extends AppBaseController
{

	/** @var  AlumnoRepository */
	private $alumnoRepository;
	private $alumnoProyectoRepository;

	function __construct(AlumnoRepository $alumnoRepo)
	{
		$this->alumnoRepository = $alumnoRepo;
	}

	/**
	 * Display a listing of the Alumno.
	 *
	 * @return Response
	 */
	public function index()
	{
		$alumnos = $this->alumnoRepository->paginate(10);
		$alumnoproyectos = $this->alumnoProyectoRepository->paginate(10);

		return view('alumnos.index')
			->with('alumnos', $alumnos);
	}

	/**
	 * Show the form for creating a new Alumno.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('alumnos.create');
	}

	/**
	 * Store a newly created Alumno in storage.
	 *
	 * @param CreateAlumnoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAlumnoRequest $request)
	{
		$input = $request->all();

		$alumno = $this->alumnoRepository->create($input);

		Flash::success('Alumno guardado correctamente.');

		return redirect(route('alumnos.index'));
	}

	/**
	 * Display the specified Alumno.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$alumno = $this->alumnoRepository->find($id);

		if(empty($alumno))
		{
			Flash::error('Alumno no encontrado');

			return redirect(route('alumnos.index'));
		}

		return view('alumnos.show')->with('alumno', $alumno);
	}

	/**
	 * Show the form for editing the specified Alumno.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$alumno = $this->alumnoRepository->find($id);

		if(empty($alumno))
		{
			Flash::error('Alumno no encontrado');

			return redirect(route('alumnos.index'));
		}
		if(Auth::user()->alumno->id!=$id){
			Flash::error('No posee los privilegios para editar otros usuarios');
			return redirect(route('inicio.index'));}

		return view('alumnos.edit')->with('alumno', $alumno);
	}

	/**
	 * Update the specified Alumno in storage.
	 *
	 * @param  int              $id
	 * @param UpdateAlumnoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateAlumnoRequest $request)
	{
		$alumno = $this->alumnoRepository->find($id);

		if(empty($alumno))
		{
			Flash::error('Alumno no encontrado');

			return redirect(route('alumnos.index'));
		}

		$this->alumnoRepository->updateRich($request->all(), $id);

		Flash::success('Alumno actualizado correctamente.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Remove the specified Alumno from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$alumno = $this->alumnoRepository->find($id);

		if(empty($alumno))
		{
			Flash::error('Alumno no encontrado');

			return redirect(route('alumnos.index'));
		}

		$this->alumnoRepository->delete($id);

		Flash::success('Alumno borrado correctamente.');

		return redirect(route('alumnos.index'));
	}
}
