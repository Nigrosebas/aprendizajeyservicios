<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Libraries\Repositories\AreaRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class AreaController extends AppBaseController
{

	/** @var  AreaRepository */
	private $areaRepository;

	function __construct(AreaRepository $areaRepo)
	{
		$this->areaRepository = $areaRepo;
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the Area.
	 *
	 * @return Response
	 */
	public function index()
	{
		$areas = $this->areaRepository->paginate(10);

		return view('areas.index')
			->with('areas', $areas);
	}
	

	/**
	 * Show the form for creating a new Area.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('areas.create');
	}

	/**
	 * Store a newly created Area in storage.
	 *
	 * @param CreateAreaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAreaRequest $request)
	{
		$input = $request->all();

		$area = $this->areaRepository->create($input);

		Flash::success('Area saved successfully.');

		return redirect(route('areas.index'));
	}

	/**
	 * Display the specified Area.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$area = $this->areaRepository->find($id);

		if(empty($area))
		{
			Flash::error('Area not found');

			return redirect(route('areas.index'));
		}

		return view('areas.show')->with('area', $area);
	}

	/**
	 * Show the form for editing the specified Area.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$area = $this->areaRepository->find($id);

		if(empty($area))
		{
			Flash::error('Area not found');

			return redirect(route('areas.index'));
		}

		return view('areas.edit')->with('area', $area);
	}

	/**
	 * Update the specified Area in storage.
	 *
	 * @param  int              $id
	 * @param UpdateAreaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateAreaRequest $request)
	{
		$area = $this->areaRepository->find($id);

		if(empty($area))
		{
			Flash::error('Area not found');

			return redirect(route('areas.index'));
		}

		$this->areaRepository->updateRich($request->all(), $id);

		Flash::success('Area updated successfully.');

		return redirect(route('areas.index'));
	}

	/**
	 * Remove the specified Area from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$area = $this->areaRepository->find($id);

		if(empty($area))
		{
			Flash::error('Area not found');

			return redirect(route('areas.index'));
		}

		$this->areaRepository->delete($id);

		Flash::success('Area deleted successfully.');

		return redirect(route('areas.index'));
	}
}
