<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateConocimientosRequest;
use App\Http\Requests\UpdateConocimientosRequest;
use App\Libraries\Repositories\ConocimientosRepository;
use Flash,Auth;
use App\Models\Conocimientos;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ConocimientosController extends AppBaseController
{

	/** @var  ConocimientosRepository */
	private $conocimientosRepository;

	function __construct(ConocimientosRepository $conocimientosRepo)
	{
		$this->conocimientosRepository = $conocimientosRepo;
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the Conocimientos.
	 *
	 * @return Response
	 */
	public function index()
	{
		$conocimientos = $this->conocimientosRepository->paginate(10);

		return view('conocimientos.index')
			->with('conocimientos', $conocimientos);
	}

	public function mostrar($id)
	{

		$conocimientos= Conocimientos::where('id_alumno', '=', $id)->paginate(15);
		if(empty($conocimientos))
		{
			Flash::error('Conocimientos no encontrado');

			return redirect(route('conocimientos.index'));
		}

		return view('conocimientos.index')
			->with('conocimientos', $conocimientos);
	}

	/**
	 * Show the form for creating a new Conocimientos.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('conocimientos.create');
	}

	/**
	 * Store a newly created Conocimientos in storage.
	 *
	 * @param CreateConocimientosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateConocimientosRequest $request)
	{
		$input = $request->all();

		$conocimientos = $this->conocimientosRepository->create($input);

		Flash::success('Conocimientos guardado correctamente.');

		return redirect(route('conocimientos.mostrar',[Auth::user()->alumno->id]));
	}

	/**
	 * Display the specified Conocimientos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$conocimientos = $this->conocimientosRepository->find($id);

		if(empty($conocimientos))
		{
			Flash::error('Conocimientos no encontrado');

			return redirect(route('conocimientos.index'));
		}

		return view('conocimientos.show')->with('conocimientos', $conocimientos);
	}

	/**
	 * Show the form for editing the specified Conocimientos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$conocimientos = $this->conocimientosRepository->find($id);

		if(empty($conocimientos))
		{
			Flash::error('Conocimientos no encontrado');

			return redirect(route('conocimientos.index'));
		}

		return view('conocimientos.edit')->with('conocimientos', $conocimientos);
	}

	/**
	 * Update the specified Conocimientos in storage.
	 *
	 * @param  int              $id
	 * @param UpdateConocimientosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateConocimientosRequest $request)
	{
		$conocimientos = $this->conocimientosRepository->find($id);

		if(empty($conocimientos))
		{
			Flash::error('Conocimientos no encontrado');

			return redirect(route('conocimientos.index'));
		}

		$this->conocimientosRepository->updateRich($request->all(), $id);

		Flash::success('Conocimientos actualizado correctamente.');

		return redirect(route('conocimientos.mostrar',[Auth::user()->alumno->id]));
	}

	/**
	 * Remove the specified Conocimientos from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$conocimientos = $this->conocimientosRepository->find($id);

		if(empty($conocimientos))
		{
			Flash::error('Conocimientos no encontrado');

			return redirect(route('conocimientos.index'));
		}

		$this->conocimientosRepository->delete($id);

		Flash::success('Conocimientos borrado correctamente.');

		return redirect(route('conocimientos.mostrar',[Auth::user()->alumno->id]));
	}
}
