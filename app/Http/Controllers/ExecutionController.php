<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateExecutionRequest;
use App\Http\Requests\UpdateExecutionRequest;
use App\Libraries\Repositories\ExecutionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ExecutionController extends AppBaseController
{

	/** @var  ExecutionRepository */
	private $executionRepository;

	function __construct(ExecutionRepository $executionRepo)
	{
		$this->executionRepository = $executionRepo;
	}

	/**
	 * Display a listing of the Execution.
	 *
	 * @return Response
	 */
	public function index()
	{
		$executions = $this->executionRepository->paginate(10);

		return view('executions.index')
			->with('executions', $executions);
	}

	/**
	 * Show the form for creating a new Execution.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('executions.create');
	}

	/**
	 * Store a newly created Execution in storage.
	 *
	 * @param CreateExecutionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateExecutionRequest $request)
	{
		$input = $request->all();

		$execution = $this->executionRepository->create($input);

		Flash::success('Execution saved successfully.');

		return redirect(route('executions.index'));
	}

	/**
	 * Display the specified Execution.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$execution = $this->executionRepository->find($id);

		if(empty($execution))
		{
			Flash::error('Execution not found');

			return redirect(route('executions.index'));
		}

		return view('executions.show')->with('execution', $execution);
	}

	/**
	 * Show the form for editing the specified Execution.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$execution = $this->executionRepository->find($id);

		if(empty($execution))
		{
			Flash::error('Execution not found');

			return redirect(route('executions.index'));
		}

		return view('executions.edit')->with('execution', $execution);
	}

	/**
	 * Update the specified Execution in storage.
	 *
	 * @param  int              $id
	 * @param UpdateExecutionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateExecutionRequest $request)
	{
		$execution = $this->executionRepository->find($id);

		if(empty($execution))
		{
			Flash::error('Execution not found');

			return redirect(route('executions.index'));
		}

		$this->executionRepository->updateRich($request->all(), $id);

		Flash::success('Execution updated successfully.');

		return redirect(route('executions.index'));
	}

	/**
	 * Remove the specified Execution from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$execution = $this->executionRepository->find($id);

		if(empty($execution))
		{
			Flash::error('Execution not found');

			return redirect(route('executions.index'));
		}

		$this->executionRepository->delete($id);

		Flash::success('Execution deleted successfully.');

		return redirect(route('executions.index'));
	}
}
