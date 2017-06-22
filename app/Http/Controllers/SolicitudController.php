<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSolicitudRequest;
use App\Http\Requests\UpdateSolicitudRequest;
use App\Libraries\Repositories\SolicitudRepository;
use App\Libraries\Repositories\AreaRepository;
use App\Models\Solicitud;
use App\Models\Area;
use Flash,Auth;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SolicitudController extends AppBaseController
{

	/** @var  SolicitudRepository */
	private $solicitudRepository;
	private $areaRepository;

	function __construct(SolicitudRepository $solicitudRepo, AreaRepository $areaRepo)
	{
		$this->solicitudRepository = $solicitudRepo;
		$this->areaRepository = $areaRepo;
		$this->middleware('auth');
		//$this->middleware('empresa',['only'=>['mostrar','create','store','show','edit','update','destroy']]);
	}

	/**
	 * Display a listing of the Solicitud.
	 *
	 * @return Response
	 */
	public function index()
	{
		$solicituds = $this->solicitudRepository->paginate(10);

		return view('solicituds.index')
			->with('solicituds', $solicituds);
	}

	public function mostrar($id)
	{
		//$certificados = $this->certificadoRepository->findAllBy('id_alumno',$id);
		$solicituds= Solicitud::where('rut_profesor', '=', $id)->paginate(15);
		if(empty($solicituds))
		{
			Flash::error('Solictud no encontrada');

			return redirect(route('inicio.index'));
		}

		return view('solicituds.index')
			->with('solicituds', $solicituds);
	}

	/**
	 * Show the form for creating a new Solicitud.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::check()){
			if(Auth::user()->rol=='Profesor'){

				return view('solicituds.create');
			}
			else{
				return redirect(route('inicio.index'));
			}

		}
	}

	/**
	 * Store a newly created Solicitud in storage.
	 *
	 * @param CreateSolicitudRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSolicitudRequest $request)
	{
		$input = $request->all();

		$solicitud = $this->solicitudRepository->create($input);

		Flash::success('Solicitud guardada con éxito.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Display the specified Solicitud.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$solicitud = $this->solicitudRepository->find($id);

		if(empty($solicitud))
		{
			Flash::error('Solicitud not found');

			return redirect(route('solicituds.index'));
		}

		return view('solicituds.show')->with('solicitud', $solicitud);
	}

	/**
	 * Show the form for editing the specified Solicitud.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$solicitud = $this->solicitudRepository->find($id);

		if(empty($solicitud))
		{
			Flash::error('Solicitud not found');

			return redirect(route('solicituds.index'));
		}

		return view('solicituds.edit')->with('solicitud', $solicitud);
	}

	/**
	 * Update the specified Solicitud in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSolicitudRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSolicitudRequest $request)
	{
		$solicitud = $this->solicitudRepository->find($id);

		if(empty($solicitud))
		{
			Flash::error('Solicitud not found');

			return redirect(route('inicio.index'));
		}

		$this->solicitudRepository->updateRich($request->all(), $id);

		Flash::success('Solicitud updated successfully.');

		return redirect(route('solicituds.mostrar',[Auth::user()->profesor->rut_profesor]));
	}

	/**
	 * Remove the specified Solicitud from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$solicitud = $this->solicitudRepository->find($id);

		if(empty($solicitud))
		{
			Flash::error('Solicitud not found');

			return redirect(route('inicio.index'));
		}

		$this->solicitudRepository->delete($id);

		Flash::success('Solicitud deleted successfully.');

		return redirect(route('solicituds.mostrar',[Auth::user()->profesor]));
	}
}
