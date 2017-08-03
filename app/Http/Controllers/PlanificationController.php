<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePlanificationRequest;
use App\Http\Requests\UpdatePlanificationRequest;
use App\Libraries\Repositories\PlanificationRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PlanificationController extends AppBaseController
{

	/** @var  PlanificationRepository */
	private $planificationRepository;

	function __construct(PlanificationRepository $planificationRepo)
	{
		$this->planificationRepository = $planificationRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Planification.
	 *
	 * @return Response
	 */
	public function index()
	{
		$planifications = $this->planificationRepository->paginate(10);

		return view('planifications.index')
			->with('planifications', $planifications);
	}

	/**
	 * Show the form for creating a new Planification.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('planifications.create');
	}

	/**
	 * Store a newly created Planification in storage.
	 *
	 * @param CreatePlanificationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePlanificationRequest $request)
	{
		$input = $request->all();

		$planification = $this->planificationRepository->create($input);

		Flash::success('Planification saved successfully.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Display the specified Planification.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$planification = $this->planificationRepository->find($id);

		if(empty($planification))
		{
			Flash::error('Planification not found');

			return redirect(route('inicio.index'));
		}

		return view('planifications.show')->with('planification', $planification);
	}

	/**
	 * Show the form for editing the specified Planification.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$planification = $this->planificationRepository->find($id);

		if(empty($planification))
		{
			Flash::error('Planification not found');

			return redirect(route('inicio.index'));
		}

		return view('planifications.edit')->with('planification', $planification);
	}

	/**
	 * Update the specified Planification in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePlanificationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePlanificationRequest $request)
	{
		$planification = $this->planificationRepository->find($id);

		if(empty($planification))
		{
			Flash::error('Planification not found');

			return redirect(route('inicio.index'));
		}

		$this->planificationRepository->updateRich($request->all(), $id);

		Flash::success('Planification updated successfully.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Remove the specified Planification from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$planification = $this->planificationRepository->find($id);

		if(empty($planification))
		{
			Flash::error('Planification not found');

			return redirect(route('inicio.index'));
		}

		$this->planificationRepository->delete($id);

		Flash::success('Planification deleted successfully.');

		return redirect(route('inicio.index'));
	}
}
