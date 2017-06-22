<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProfesorRequest;
use App\Http\Requests\UpdateProfesorRequest;
use App\Libraries\Repositories\ProfesorRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ProfesorController extends AppBaseController
{

	/** @var  ProfesorRepository */
	private $profesorRepository;

	function __construct(ProfesorRepository $profesorRepo)
	{
		$this->profesorRepository = $profesorRepo;
	}

	/**
	 * Display a listing of the Profesor.
	 *
	 * @return Response
	 */
	public function index()
	{
		$profesors = $this->profesorRepository->paginate(10);

		return view('profesors.index')
			->with('profesors', $profesors);
	}

	/**
	 * Show the form for creating a new Profesor.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('profesors.create');
	}

	/**
	 * Store a newly created Profesor in storage.
	 *
	 * @param CreateProfesorRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProfesorRequest $request)
	{
		$input = $request->all();

		$profesor = $this->profesorRepository->create($input);

		Flash::success('Profesor saved successfully.');

		return redirect(route('profesors.index'));
	}

	/**
	 * Display the specified Profesor.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$profesor = $this->profesorRepository->find($id);

		if(empty($profesor))
		{
			Flash::error('Profesor not found');

			return redirect(route('profesors.index'));
		}

		return view('profesors.show')->with('profesor', $profesor);
	}

	/**
	 * Show the form for editing the specified Profesor.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$profesor = $this->profesorRepository->find($id);

		if(empty($profesor))
		{
			Flash::error('Profesor not found');

			return redirect(route('profesors.index'));
		}

		return view('profesors.edit')->with('profesor', $profesor);
	}

	/**
	 * Update the specified Profesor in storage.
	 *
	 * @param  int              $id
	 * @param UpdateProfesorRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProfesorRequest $request)
	{
		$profesor = $this->profesorRepository->find($id);

		if(empty($profesor))
		{
			Flash::error('Profesor not found');

			return redirect(route('profesors.index'));
		}

		$this->profesorRepository->updateRich($request->all(), $id);

		Flash::success('Profesor updated successfully.');

		return redirect(route('profesors.index'));
	}

	/**
	 * Remove the specified Profesor from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$profesor = $this->profesorRepository->find($id);

		if(empty($profesor))
		{
			Flash::error('Profesor not found');

			return redirect(route('profesors.index'));
		}

		$this->profesorRepository->delete($id);

		Flash::success('Profesor deleted successfully.');

		return redirect(route('profesors.index'));
	}
}
