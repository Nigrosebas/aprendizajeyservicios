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
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the AlumnoProyecto.
	 *
	 * @return Response
	 */
	public function index()
	{
		$alumnoproyectos = $this->alumnoProyectoRepository->paginate(10);

		return view('alumnoproyectos.index')
			->with('alumnoproyectos', $alumnoproyectos);
	}

	/**
	 * Show the form for creating a new AlumnoProyecto.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('alumnoproyectos.create');
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
		$alumnoproyecto = $this->alumnoProyectoRepository->find($id);

		if(empty($alumnoproyecto))
		{
			Flash::error('AlumnoProyecto not found');

			return redirect(route('alumnoproyectos.index'));
		}

		return view('alumnoproyectos.show')->with('alumnoproyecto', $alumnoproyecto);
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
		$alumnoproyecto = $this->alumnoProyectoRepository->find($id);

		if(empty($alumnoproyecto))
		{
			Flash::error('AlumnoProyecto not found');

			return redirect(route('alumnoproyectos.index'));
		}

		return view('alumnoproyectos.edit')->with('alumnoproyecto', $alumnoproyecto);
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
		$alumnoproyecto = $this->alumnoProyectoRepository->find($id);

		if(empty($alumnoproyecto))
		{
			Flash::error('AlumnoProyecto not found');

			return redirect(route('alumnoproyectos.index'));
		}

		$this->alumnoProyectoRepository->updateRich($request->all(), $id);

		Flash::success('AlumnoProyecto updated successfully.');

		return redirect(route('alumnoproyectos.index'));
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
		//$alumnoproyecto = AlumnoProyecto::select('id')->where('id_proyecto','=',$id_proyecto and 'rut', '=',$rut);
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
