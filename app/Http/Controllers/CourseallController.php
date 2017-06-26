<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCourseallRequest;
use App\Http\Requests\UpdateCourseallRequest;
use App\Libraries\Repositories\CourseallRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CourseallController extends AppBaseController
{

	/** @var  CourseallRepository */
	private $courseallRepository;

	function __construct(CourseallRepository $courseallRepo)
	{
		$this->courseallRepository = $courseallRepo;
	}

	/**
	 * Display a listing of the Courseall.
	 *
	 * @return Response
	 */
	public function index()
	{
		$coursealls = $this->courseallRepository->paginate(10);

		return view('coursealls.index')
			->with('coursealls', $coursealls);
	}

	/**
	 * Show the form for creating a new Courseall.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('coursealls.create');
	}

	/**
	 * Store a newly created Courseall in storage.
	 *
	 * @param CreateCourseallRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCourseallRequest $request)
	{
		$input = $request->all();

		$courseall = $this->courseallRepository->create($input);

		Flash::success('Courseall saved successfully.');

		return redirect(route('coursealls.index'));
	}

	/**
	 * Display the specified Courseall.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$courseall = $this->courseallRepository->find($id);

		if(empty($courseall))
		{
			Flash::error('Courseall not found');

			return redirect(route('coursealls.index'));
		}

		return view('coursealls.show')->with('courseall', $courseall);
	}

	/**
	 * Show the form for editing the specified Courseall.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$courseall = $this->courseallRepository->find($id);

		if(empty($courseall))
		{
			Flash::error('Courseall not found');

			return redirect(route('coursealls.index'));
		}

		return view('coursealls.edit')->with('courseall', $courseall);
	}

	/**
	 * Update the specified Courseall in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCourseallRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCourseallRequest $request)
	{
		$courseall = $this->courseallRepository->find($id);

		if(empty($courseall))
		{
			Flash::error('Courseall not found');

			return redirect(route('coursealls.index'));
		}

		$this->courseallRepository->updateRich($request->all(), $id);

		Flash::success('Courseall updated successfully.');

		return redirect(route('coursealls.index'));
	}

	/**
	 * Remove the specified Courseall from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$courseall = $this->courseallRepository->find($id);

		if(empty($courseall))
		{
			Flash::error('Courseall not found');

			return redirect(route('coursealls.index'));
		}

		$this->courseallRepository->delete($id);

		Flash::success('Courseall deleted successfully.');

		return redirect(route('coursealls.index'));
	}
}
