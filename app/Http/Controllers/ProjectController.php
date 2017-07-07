<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Libraries\Repositories\ProjectRepository;
use App\Libraries\Repositories\AlumnoProyectoRepository;
use App\Libraries\Repositories\CourseRepository;
use App\Libraries\Repositories\AlumnoRepository;
use App\Libraries\Repositories\ProfesorRepository;
use App\Libraries\Repositories\MotivationRepository;
use Flash;
use App\Models\Project;
use App\Models\Motivation;
use App\Models\Profesor;
use App\Models\Course;
use App\Models\Alumno;
use App\Models\AlumnoProyecto;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use DB;
use Auth;

class ProjectController extends AppBaseController
{

	/** @var  ProjectRepository */
	private $projectRepository;
	private $courseRepository;
	private $motivationRepository;
	private $profesorRepository;


	function __construct(ProjectRepository $projectRepo,CourseRepository $courseRepo,AlumnoRepository $alumnoRepo,AlumnoProyectoRepository $alumnoProyectoRepo,ProfesorRepository $profesorRepo,MotivationRepository $motivationRepo)
	{
		$this->projectRepository = $projectRepo;
		$this->courseRepository = $courseRepo;
		$this->alumnoRepository = $alumnoRepo;
		$this->alumnoProyectoRepository = $alumnoProyectoRepo;
		$this->profesorRepository = $profesorRepo;
		$this->motivationRepository = $motivationRepo;
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
		if(Auth::check()){
            if(Auth::user()->rol=='Profesor') {
            	$id = Auth::user()->Profesor->id_university;
            	$cursos = Course::where('id_university','=',$id)->lists('name_course', 'id');

            }
        }
		//$cursos = Course::lists('name_course', 'id');
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
		if(empty($input['evaluaciones']))
		{

		}
		else
		{
		$input['evaluaciones'] = implode(', ', $input['evaluaciones']);
		}

		$project = $this->projectRepository->create($input);
		/*$obtenerid = Project::orderBy('updated_at', 'desc')->first();
		$input2['id_project'] = $obtenerid['id'];

		$motivation = $this->motivationRepository->create($input2);*/

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
		$results = DB::table('alumnoproyectos')->select('id','nombre','rut','rol','id_proyecto')->get();
		$cursos = Course::select('id','name_course')->get();

		if(Auth::check()){
				$rut = Auth::user()->rut;
            	$consultarrut = Motivation::where('rut','=',$rut)->select('rut')->get();
            	$created = Motivation::where('rut','=',$rut)->first();
            if(Auth::user()->rol=='Profesor') {
            	$countpregunta1si = Motivation::where('pregunta1','=','Si')->count();
            	$countpregunta2si = Motivation::where('pregunta2','=','Si')->count();
            	$countpregunta3si = Motivation::where('pregunta3','=','Si')->count();
            	$countpregunta4si = Motivation::where('pregunta4','=','Si')->count();
            	$countpregunta1no = Motivation::where('pregunta1','=','No')->count();
            	$countpregunta2no = Motivation::where('pregunta2','=','No')->count();
            	$countpregunta3no = Motivation::where('pregunta3','=','No')->count();
            	$countpregunta4no = Motivation::where('pregunta4','=','No')->count();
            }
        
			if(empty($project))
			{
				Flash::error('Project not found');

				return redirect(route('projects.index'));
			}

			if(Auth::user()->rol=='Profesor') {
				return view('projects.show')
				->with('countpregunta1si', $countpregunta1si)
				->with('countpregunta2si', $countpregunta2si)
				->with('countpregunta3si', $countpregunta3si)
				->with('countpregunta4si', $countpregunta4si)
				->with('countpregunta1no', $countpregunta1no)
				->with('countpregunta2no', $countpregunta2no)
				->with('countpregunta3no', $countpregunta3no)
				->with('countpregunta4no', $countpregunta4no)
				->with('project', $project)
				->with('cursos', $cursos)
				->with('alumnos', $alumnos)
				->with('profesors',$profesors)
				->with('consultarrut',$consultarrut)
				->with('alumnoproyectos', $results);
				}
			else{
				return view('projects.show')
				->with('cursos', $cursos)
				->with('created',$created)
				->with('project', $project)
				->with('alumnos', $alumnos)
				->with('profesors',$profesors)
				->with('consultarrut',$consultarrut)
				->with('alumnoproyectos', $results);
			}
		}
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
		if(Auth::check()){
            if(Auth::user()->rol=='Profesor') {
            	$id = Auth::user()->Profesor->id_university;
            	$cursos = Course::where('id_university','=',$id)->lists('name_course', 'id');

            }
        }

		if(empty($project))
		{
			Flash::error('Project not found');

			return redirect(route('projects.index'));
		}

		return view('projects.edit')
		->with('project', $project)
		->with('cursos',$cursos);
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
