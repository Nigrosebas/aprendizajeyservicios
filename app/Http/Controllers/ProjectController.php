<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Libraries\Repositories\ProjectRepository;
use App\Libraries\Repositories\AlumnoProyectoRepository;
use App\Libraries\Repositories\CourseRepository;
use App\Libraries\Repositories\AlumnoRepository;
use App\Libraries\Repositories\ProfesorRepository;
use Flash;
use App\Models\Project;
use App\Models\Profesor;
use App\Models\Course;
use App\Models\Alumno;
use App\Models\AlumnoProyecto;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use DB;

class ProjectController extends AppBaseController
{

	/** @var  ProjectRepository */
	private $projectRepository;
	private $courseRepository;
	private $profesorRepository;


	function __construct(ProjectRepository $projectRepo,CourseRepository $courseRepo,AlumnoRepository $alumnoRepo,AlumnoProyectoRepository $alumnoProyectoRepo,ProfesorRepository $profesorRepo)
	{
		$this->projectRepository = $projectRepo;
		$this->courseRepository = $courseRepo;
		$this->alumnoRepository = $alumnoRepo;
		$this->alumnoProyectoRepository = $alumnoProyectoRepo;
		$this->profesorRepository = $profesorRepo;
	}

	/**
	 * Display a listing of the Project.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = $this->projectRepository->paginate(10);

		return view('projects.index')
			->with('projects', $projects);
	}

	/**
	 * Show the form for creating a new Project.
	 *
	 * @return Response
	 */

	public function mostrar($id)
	{
		//$certificados = $this->certificadoRepository->findAllBy('id_alumno',$id);
		$projects= Project::where('id_profesor', '=', $id)->paginate(15);
		if(empty($projects))
		{
			Flash::error('Solictud no encontrada');

			return redirect(route('inicio.index'));
		}

		return view('projects.index')
			->with('projects', $projects);
	}

	public function create()
	{
		$cursos = Course::lists('name_course', 'id');
		return view('projects.create')->with('cursos',$cursos);
	}

	/**
	 * Store a newly created Project in storage.
	 *
	 * @param CreateProjectRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProjectRequest $request)
	{
		$input = $request->all();
		$input['evaluaciones'] = implode(', ', $input['evaluaciones']);

		$project = $this->projectRepository->create($input);

		Flash::success('Project saved successfully.');

		return redirect(route('projects.index'));
	}

	/**
	 * Display the specified Project.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$project = $this->projectRepository->find($id);
		$alumnos = $this->alumnoRepository->paginate(100);
		$profesors = $this->profesorRepository->paginate(100);
		$results = DB::table('alumnoproyectos')->select('id','nombre','rut','id_proyecto')
		->get();

		//dd($results);

		if(empty($project))
		{
			Flash::error('Project not found');

			return redirect(route('projects.index'));
		}

		return view('projects.show')
		->with('project', $project)
		->with('alumnos', $alumnos)
		->with('profesors',$profesors)
		->with('alumnoProyectos', $results);
	}

	/**
	 * Show the form for editing the specified Project.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$project = $this->projectRepository->find($id);

		if(empty($project))
		{
			Flash::error('Project not found');

			return redirect(route('projects.index'));
		}

		return view('projects.edit')->with('project', $project);
	}

	/**
	 * Update the specified Project in storage.
	 *
	 * @param  int              $id
	 * @param UpdateProjectRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProjectRequest $request)
	{
		$project = $this->projectRepository->find($id);

		if(empty($project))
		{
			Flash::error('Project not found');

			return redirect(route('projects.index'));
		}

		$this->projectRepository->updateRich($request->all(), $id);

		Flash::success('Project updated successfully.');

		return redirect(route('projects.index'));
	}

	/**
	 * Remove the specified Project from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$project = $this->projectRepository->find($id);

		if(empty($project))
		{
			Flash::error('Project not found');

			return redirect(route('projects.index'));
		}

		$this->projectRepository->delete($id);

		Flash::success('Project deleted successfully.');

		return redirect(route('projects.index'));
	}
}
