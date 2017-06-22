<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAlumnoProyectoRequest;
use App\Http\Requests\UpdateAlumnoProyectoRequest;
use App\Libraries\Repositories\AlumnoProyectoRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\AlumnoProyecto;
use DB;

class AlumnoProyectoController extends AppBaseController
{

	/** @var  AlumnoProyectoRepository */
	private $alumnoProyectoRepository;

	function __construct(AlumnoProyectoRepository $alumnoProyectoRepo)
	{
		$this->alumnoProyectoRepository = $alumnoProyectoRepo;
	}

	/**
	 * Display a listing of the AlumnoProyecto.
	 *
	 * @return Response
	 */
	public function index()
	{
		$alumnoProyectos = $this->alumnoProyectoRepository->paginate(10);

		return view('alumnoProyectos.index')
			->with('alumnoProyectos', $alumnoProyectos);
	}

	/**
	 * Show the form for creating a new AlumnoProyecto.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('alumnoProyectos.create');
	}

	/**
	 * Store a newly created AlumnoProyecto in storage.
	 *
	 * @param CreateAlumnoProyectoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAlumnoProyectoRequest $request)
	{
		$input = $request->all();


		$var=AlumnoProyecto::create($input);
	}

	/**
	 * Display the specified AlumnoProyecto.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$alumnoProyecto = $this->alumnoProyectoRepository->find($id);

		if(empty($alumnoProyecto))
		{
			Flash::error('AlumnoProyecto not found');

			return redirect(route('alumnoProyectos.index'));
		}

		return view('alumnoProyectos.show')->with('alumnoProyecto', $alumnoProyecto);
	}

	/**
	 * Show the form for editing the specified AlumnoProyecto.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$alumnoProyecto = $this->alumnoProyectoRepository->find($id);

		if(empty($alumnoProyecto))
		{
			Flash::error('AlumnoProyecto not found');

			return redirect(route('alumnoProyectos.index'));
		}

		return view('alumnoProyectos.edit')->with('alumnoProyecto', $alumnoProyecto);
	}

	/**
	 * Update the specified AlumnoProyecto in storage.
	 *
	 * @param  int              $id
	 * @param UpdateAlumnoProyectoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateAlumnoProyectoRequest $request)
	{
		$alumnoProyecto = $this->alumnoProyectoRepository->find($id);

		if(empty($alumnoProyecto))
		{
			Flash::error('AlumnoProyecto not found');

			return redirect(route('alumnoProyectos.index'));
		}

		$this->alumnoProyectoRepository->updateRich($request->all(), $id);

		Flash::success('AlumnoProyecto updated successfully.');

		return redirect(route('alumnoProyectos.index'));
	}

	/**
	 * Remove the specified AlumnoProyecto from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id,UpdateAlumnoProyectoRequest $request)
	{

		$input = $request->all();
		$rut = $input['rut'];
		$id_proyecto = $input['id_proyecto'];
		//$alumnoProyecto = AlumnoProyecto::select('id')->where('id_proyecto','=',$id_proyecto and 'rut', '=',$rut);
		$results = DB::table('alumnoproyectos')->select('id')
		->where('id_proyecto', $id_proyecto)
		->where('rut',$rut)
		->get();
		$results = json_decode(json_encode($results), true);
		foreach ($results as $result) {
		$this->alumnoProyectoRepository->delete($result);
		}

	}
}
