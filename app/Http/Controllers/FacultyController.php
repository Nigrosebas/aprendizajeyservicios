<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Libraries\Repositories\FacultyRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class FacultyController extends AppBaseController
{

	/** @var  FacultyRepository */
	private $facultyRepository;

	function __construct(FacultyRepository $facultyRepo)
	{
		$this->facultyRepository = $facultyRepo;
	}

	/**
	 * Display a listing of the Faculty.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faculties = $this->facultyRepository->paginate(10);

		return view('faculties.index')
			->with('faculties', $faculties);
	}

	/**
	 * Show the form for creating a new Faculty.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('faculties.create');
	}

	/**
	 * Store a newly created Faculty in storage.
	 *
	 * @param CreateFacultyRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFacultyRequest $request)
	{
		$input = $request->all();

		$faculty = $this->facultyRepository->create($input);

		Flash::success('Faculty saved successfully.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Display the specified Faculty.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$faculty = $this->facultyRepository->find($id);

		if(empty($faculty))
		{
			Flash::error('Faculty not found');

			return redirect(route('faculties.index'));
		}

		return view('faculties.show')->with('faculty', $faculty);
	}

	/**
	 * Show the form for editing the specified Faculty.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$faculty = $this->facultyRepository->find($id);

		if(empty($faculty))
		{
			Flash::error('Faculty not found');

			return redirect(route('faculties.index'));
		}

		return view('faculties.edit')->with('faculty', $faculty);
	}

	/**
	 * Update the specified Faculty in storage.
	 *
	 * @param  int              $id
	 * @param UpdateFacultyRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateFacultyRequest $request)
	{
		$faculty = $this->facultyRepository->find($id);

		if(empty($faculty))
		{
			Flash::error('Faculty not found');

			return redirect(route('faculties.index'));
		}

		$this->facultyRepository->updateRich($request->all(), $id);

		Flash::success('Faculty updated successfully.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Remove the specified Faculty from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$faculty = $this->facultyRepository->find($id);

		if(empty($faculty))
		{
			Flash::error('Faculty not found');

			return redirect(route('faculties.index'));
		}

		$this->facultyRepository->delete($id);

		Flash::success('Faculty deleted successfully.');

		return redirect(route('inicio.index'));
	}
}
