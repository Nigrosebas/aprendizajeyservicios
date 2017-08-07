<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClosingRequest;
use App\Http\Requests\UpdateClosingRequest;
use App\Libraries\Repositories\ClosingRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ClosingController extends AppBaseController
{

	/** @var  ClosingRepository */
	private $closingRepository;

	function __construct(ClosingRepository $closingRepo)
	{
		$this->closingRepository = $closingRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Closing.
	 *
	 * @return Response
	 */
	public function index()
	{
		$closings = $this->closingRepository->paginate(10);

		return view('closings.index')
			->with('closings', $closings);
	}

	/**
	 * Show the form for creating a new Closing.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('closings.create');
	}

	/**
	 * Store a newly created Closing in storage.
	 *
	 * @param CreateClosingRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClosingRequest $request)
	{
		$input = $request->all();

		$closing = $this->closingRepository->create($input);

		Flash::success('Cierre guardado con Exito.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Display the specified Closing.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$closing = $this->closingRepository->find($id);

		if(empty($closing))
		{
			Flash::error('Closing not found');

			return redirect(route('inicio.index'));
		}

		return view('closings.show')->with('closing', $closing);
	}

	/**
	 * Show the form for editing the specified Closing.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$closing = $this->closingRepository->find($id);

		if(empty($closing))
		{
			Flash::error('Closing not found');

			return redirect(route('inicio.index'));
		}

		return view('closings.edit')->with('closing', $closing);
	}

	/**
	 * Update the specified Closing in storage.
	 *
	 * @param  int              $id
	 * @param UpdateClosingRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateClosingRequest $request)
	{
		$closing = $this->closingRepository->find($id);

		if(empty($closing))
		{
			Flash::error('Closing not found');

			return redirect(route('inicio.index'));
		}

		$this->closingRepository->updateRich($request->all(), $id);

		Flash::success('Closing updated successfully.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Remove the specified Closing from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$closing = $this->closingRepository->find($id);

		if(empty($closing))
		{
			Flash::error('Closing not found');

			return redirect(route('inicio.index'));
		}

		$this->closingRepository->delete($id);

		Flash::success('Closing deleted successfully.');

		return redirect(route('inicio.index'));
	}
}
