<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Libraries\Repositories\CourseRepository;
use App\Libraries\Repositories\FacultyRepository;
use App\Libraries\Repositories\CourseallRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use Auth;
use App\Models\Faculty;

class CourseController extends AppBaseController
{

	/** @var  CourseRepository */
	private $courseRepository;
	private $facultyRepository;
	private $courseallRepository;

	function __construct(CourseRepository $courseRepo,FacultyRepository $facultyRepo,CourseallRepository $courseallRepo)
	{
		$this->courseRepository = $courseRepo;
		$this->facultyRepository = $facultyRepo;
		$this->courseallRepository = $courseallRepo;

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
		if(Auth::check()){
            if(Auth::user()->rol=='Coordinador') {
            	$id = Auth::user()->Coordinador->id_university;
            	$facultades = Faculty::where('id_university','=',$id)->lists('nombre_facultad', 'id');

            }
        }
        else{
        $facultades = Faculty::lists('nombre_facultad', 'id');}
        $coursealls = $this->courseallRepository->paginate(1800);
		return view('courses.create')
		->with('facultades',$facultades)
		->with('coursealls', $coursealls);
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
		$id = $input['id_faculty'];
		$nombredelafacultad = Faculty::where('id','=',$id)->select('nombre_facultad')->first();
		$input['name_faculty'] = $nombredelafacultad['nombre_facultad'];

		$course = $this->courseRepository->create($input);

		Flash::success('Course saved successfully.');

		return redirect(route('inicio.index'));
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

			return redirect(route('inicio.index'));
		}

		$this->courseRepository->updateRich($request->all(), $id);

		Flash::success('Course updated successfully.');

		return redirect(route('inicio.index'));
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

		return redirect(route('inicio.index'));
	}
}
