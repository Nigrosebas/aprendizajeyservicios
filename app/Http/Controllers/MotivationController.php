<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMotivationRequest;
use App\Http\Requests\UpdateMotivationRequest;
use App\Libraries\Repositories\MotivationRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class MotivationController extends AppBaseController
{

	/** @var  MotivationRepository */
	private $motivationRepository;

	function __construct(MotivationRepository $motivationRepo)
	{
		$this->motivationRepository = $motivationRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Motivation.
	 *
	 * @return Response
	 */
	public function index()
	{
		$motivations = $this->motivationRepository->paginate(10);

		return view('motivations.index')
			->with('motivations', $motivations);
	}

	/**
	 * Show the form for creating a new Motivation.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('motivations.create');
	}

	/**
	 * Store a newly created Motivation in storage.
	 *
	 * @param CreateMotivationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMotivationRequest $request)
	{
		$input = $request->all();

		$motivation = $this->motivationRepository->create($input);

		Flash::success('Motivation saved successfully.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Display the specified Motivation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$motivation = $this->motivationRepository->find($id);

		if(empty($motivation))
		{
			Flash::error('Motivation not found');

			return redirect(route('motivations.index'));
		}

		return view('motivations.show')->with('motivation', $motivation);
	}

	/**
	 * Show the form for editing the specified Motivation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$motivation = $this->motivationRepository->find($id);

		if(empty($motivation))
		{
			Flash::error('Motivation not found');

			return redirect(route('motivations.index'));
		}

		return view('motivations.edit')->with('motivation', $motivation);
	}

	/**
	 * Update the specified Motivation in storage.
	 *
	 * @param  int              $id
	 * @param UpdateMotivationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateMotivationRequest $request)
	{
		$motivation = $this->motivationRepository->find($id);

		if(empty($motivation))
		{
			Flash::error('Motivation not found');

			return redirect(route('inicio.index'));
		}

		$this->motivationRepository->updateRich($request->all(), $id);

		Flash::success('Motivation updated successfully.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Remove the specified Motivation from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$motivation = $this->motivationRepository->find($id);

		if(empty($motivation))
		{
			Flash::error('Motivation not found');

			return redirect(route('inicio.index'));
		}

		$this->motivationRepository->delete($id);

		Flash::success('Motivation deleted successfully.');

		return redirect(route('inicio.index'));
	}
}
