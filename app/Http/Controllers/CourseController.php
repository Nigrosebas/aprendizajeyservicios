<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Libraries\Repositories\CourseRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CourseController extends AppBaseController
{

	/** @var  CourseRepository */
	private $courseRepository;

	function __construct(CourseRepository $courseRepo)
	{
		$this->courseRepository = $courseRepo;
	}

	/**
	 * Display a listing of the Course.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = $this->courseRepository->paginate(10);

		return view('courses.index')
			->with('courses', $courses);
	}

	/**
	 * Show the form for creating a new Course.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('courses.create');
	}

	/**
	 * Store a newly created Course in storage.
	 *
	 * @param CreateCourseRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCourseRequest $request)
	{
		$input = $request->all();

		$course = $this->courseRepository->create($input);

		Flash::success('Course saved successfully.');

		return redirect(route('courses.index'));
	}

	/**
	 * Display the specified Course.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$course = $this->courseRepository->find($id);

		if(empty($course))
		{
			Flash::error('Course not found');

			return redirect(route('courses.index'));
		}

		return view('courses.show')->with('course', $course);
	}

	/**
	 * Show the form for editing the specified Course.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$course = $this->courseRepository->find($id);

		if(empty($course))
		{
			Flash::error('Course not found');

			return redirect(route('courses.index'));
		}

		return view('courses.edit')->with('course', $course);
	}

	/**
	 * Update the specified Course in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCourseRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCourseRequest $request)
	{
		$course = $this->courseRepository->find($id);

		if(empty($course))
		{
			Flash::error('Course not found');

			return redirect(route('courses.index'));
		}

		$this->courseRepository->updateRich($request->all(), $id);

		Flash::success('Course updated successfully.');

		return redirect(route('courses.index'));
	}

	/**
	 * Remove the specified Course from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$course = $this->courseRepository->find($id);

		if(empty($course))
		{
			Flash::error('Course not found');

			return redirect(route('courses.index'));
		}

		$this->courseRepository->delete($id);

		Flash::success('Course deleted successfully.');

		return redirect(route('courses.index'));
	}
}
