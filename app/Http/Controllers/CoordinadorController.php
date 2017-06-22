<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCoordinadorRequest;
use App\Http\Requests\UpdateCoordinadorRequest;
use App\Libraries\Repositories\CoordinadorRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CoordinadorController extends AppBaseController
{

	/** @var  CoordinadorRepository */
	private $coordinadorRepository;

	function __construct(CoordinadorRepository $coordinadorRepo)
	{
		$this->coordinadorRepository = $coordinadorRepo;
	}

	/**
	 * Display a listing of the Coordinador.
	 *
	 * @return Response
	 */
	public function index()
	{
		$coordinadors = $this->coordinadorRepository->paginate(10);

		return view('coordinadors.index')
			->with('coordinadors', $coordinadors);
	}

	/**
	 * Show the form for creating a new Coordinador.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('coordinadors.create');
	}

	/**
	 * Store a newly created Coordinador in storage.
	 *
	 * @param CreateCoordinadorRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCoordinadorRequest $request)
	{
		$input = $request->all();

		$coordinador = $this->coordinadorRepository->create($input);

		Flash::success('Coordinador saved successfully.');

		return redirect(route('coordinadors.index'));
	}

	/**
	 * Display the specified Coordinador.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$coordinador = $this->coordinadorRepository->find($id);

		if(empty($coordinador))
		{
			Flash::error('Coordinador not found');

			return redirect(route('coordinadors.index'));
		}

		return view('coordinadors.show')->with('coordinador', $coordinador);
	}

	/**
	 * Show the form for editing the specified Coordinador.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$coordinador = $this->coordinadorRepository->find($id);

		if(empty($coordinador))
		{
			Flash::error('Coordinador not found');

			return redirect(route('coordinadors.index'));
		}

		return view('coordinadors.edit')->with('coordinador', $coordinador);
	}

	/**
	 * Update the specified Coordinador in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCoordinadorRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCoordinadorRequest $request)
	{
		$coordinador = $this->coordinadorRepository->find($id);

		if(empty($coordinador))
		{
			Flash::error('Coordinador not found');

			return redirect(route('coordinadors.index'));
		}

		$this->coordinadorRepository->updateRich($request->all(), $id);

		Flash::success('Coordinador updated successfully.');

		return redirect(route('coordinadors.index'));
	}

	/**
	 * Remove the specified Coordinador from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$coordinador = $this->coordinadorRepository->find($id);

		if(empty($coordinador))
		{
			Flash::error('Coordinador not found');

			return redirect(route('coordinadors.index'));
		}

		$this->coordinadorRepository->delete($id);

		Flash::success('Coordinador deleted successfully.');

		return redirect(route('coordinadors.index'));
	}
}
