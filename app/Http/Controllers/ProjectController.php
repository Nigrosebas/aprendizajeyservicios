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
use App\Libraries\Repositories\DiagnosticRepository;
use App\Libraries\Repositories\PlanificationRepository;
use App\Libraries\Repositories\ExecutionRepository;
use App\Libraries\Repositories\ClosingRepository;
use Flash;
use App\Models\Project;
use App\Models\Motivation;
use App\Models\Diagnostic;
use App\Models\Planification;
use App\Models\Execution;
use App\Models\Closing;
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


	function __construct(ProjectRepository $projectRepo,CourseRepository $courseRepo,AlumnoRepository $alumnoRepo,AlumnoProyectoRepository $alumnoProyectoRepo,ProfesorRepository $profesorRepo,MotivationRepository $motivationRepo,DiagnosticRepository $diagnosticRepo,PlanificationRepository $planificationRepo,ExecutionRepository $executionRepo,ClosingRepository $closingRepo)
	{
		$this->projectRepository = $projectRepo;
		$this->courseRepository = $courseRepo;
		$this->alumnoRepository = $alumnoRepo;
		$this->alumnoProyectoRepository = $alumnoProyectoRepo;
		$this->profesorRepository = $profesorRepo;
		$this->motivationRepository = $motivationRepo;
		$this->diagnosticRepository = $diagnosticRepo;
		$this->planificationRepository = $planificationRepo;
		$this->executionRepository = $executionRepo;
		$this->closingRepository = $closingRepo;
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

	public function pcompleted()
	{
		$projects= Project::where('estado', '=', 'Terminado')->paginate(150);
		if(empty($projects))
		{
			Flash::error('Solictud no encontrada');

			return redirect(route('inicio.index'));
		}

		return view('projects.completed')
			->with('projects', $projects);
	}

	public function acceso($id)
	{
		$project = $this->projectRepository->find($id);
		$alumnos = $this->alumnoRepository->paginate(100);
		$profesors = $this->profesorRepository->paginate(100);
		$results = DB::table('alumnoproyectos')->select('id','nombre','rut','rol','id_proyecto')->get();
		$cursos = Course::select('id','name_course')->get();

		return view('projects.acceso')
		->with('cursos', $cursos)
		->with('project', $project)
		->with('alumnos', $alumnos)
		->with('profesors',$profesors)
		->with('alumnoproyectos', $results);

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
		$input['estado']='Vigente';
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
            	$consultarrutmotivation = Motivation::where('rut','=',$rut)->select('rut')->get();
            	$consultarrutdiagnostic = Diagnostic::where('rut','=',$rut)->select('rut')->get();
            	$consultarrutplanification = Planification::where('rut','=',$rut)->select('rut')->get();
            	$consultarrutexecution = Execution::where('rut','=',$rut)->select('rut')->get();
            	$consultarrutclosing = Closing::where('rut','=',$rut)->select('rut')->get();
            	$createdmoti = Motivation::where('rut','=',$rut)->first();
            	$createddiag = Diagnostic::where('rut','=',$rut)->first();
            	$createdplan = Planification::where('rut','=',$rut)->first();
            	$createdexec = Execution::where('rut','=',$rut)->first();
            	$createdclos = Closing::where('rut','=',$rut)->first();
            if(Auth::user()->rol=='Profesor') {
            	$countmotpregunta1si = Motivation::where('pregunta1','=','Si')->count();
            	$countmotpregunta2si = Motivation::where('pregunta2','=','Si')->count();
            	$countmotpregunta3si = Motivation::where('pregunta3','=','Si')->count();
            	$countmotpregunta4si = Motivation::where('pregunta4','=','Si')->count();
            	$countmotpregunta1no = Motivation::where('pregunta1','=','No')->count();
            	$countmotpregunta2no = Motivation::where('pregunta2','=','No')->count();
            	$countmotpregunta3no = Motivation::where('pregunta3','=','No')->count();
            	$countmotpregunta4no = Motivation::where('pregunta4','=','No')->count();

            	$countdiagpregunta1si = Diagnostic::where('pregunta1','=','Si')->count();
            	$countdiagpregunta2si = Diagnostic::where('pregunta2','=','Si')->count();
            	$countdiagpregunta3si = Diagnostic::where('pregunta3','=','Si')->count();
            	$countdiagpregunta1no = Diagnostic::where('pregunta1','=','No')->count();
            	$countdiagpregunta2no = Diagnostic::where('pregunta2','=','No')->count();
            	$countdiagpregunta3no = Diagnostic::where('pregunta3','=','No')->count();

            	$countplanpregunta1si = Planification::where('pregunta1','=','Si')->count();
            	$countplanpregunta2si = Planification::where('pregunta2','=','Si')->count();
            	$countplanpregunta1no = Planification::where('pregunta1','=','No')->count();
            	$countplanpregunta2no = Planification::where('pregunta2','=','No')->count();

            	$countexepregunta1si = Execution::where('pregunta1','=','Si')->count();
            	$countexepregunta2si = Execution::where('pregunta2','=','Si')->count();
            	$countexepregunta3si = Execution::where('pregunta3','=','Si')->count();
            	$countexepregunta1no = Execution::where('pregunta1','=','No')->count();
            	$countexepregunta2no = Execution::where('pregunta2','=','No')->count();
            	$countexepregunta3no = Execution::where('pregunta3','=','No')->count();

            	$countclopregunta1si = Closing::where('pregunta1','=','Si')->count();
            	$countclopregunta2si = Closing::where('pregunta2','=','Si')->count();
            	$countclopregunta3si = Closing::where('pregunta3','=','Si')->count();
            	$countclopregunta1no = Closing::where('pregunta1','=','No')->count();
            	$countclopregunta2no = Closing::where('pregunta2','=','No')->count();
            	$countclopregunta3no = Closing::where('pregunta3','=','No')->count();
            }
        
			if(empty($project))
			{
				Flash::error('Project not found');

				return redirect(route('projects.index'));
			}

			if(Auth::user()->rol=='Profesor') {
				return view('projects.show')
				->with('countmotpregunta1si', $countmotpregunta1si)
				->with('countmotpregunta2si', $countmotpregunta2si)
				->with('countmotpregunta3si', $countmotpregunta3si)
				->with('countmotpregunta4si', $countmotpregunta4si)
				->with('countmotpregunta1no', $countmotpregunta1no)
				->with('countmotpregunta2no', $countmotpregunta2no)
				->with('countmotpregunta3no', $countmotpregunta3no)
				->with('countmotpregunta4no', $countmotpregunta4no)
				->with('countdiagpregunta1si', $countdiagpregunta1si)
				->with('countdiagpregunta2si', $countdiagpregunta2si)
				->with('countdiagpregunta3si', $countdiagpregunta3si)
				->with('countdiagpregunta1no', $countdiagpregunta1no)
				->with('countdiagpregunta2no', $countdiagpregunta2no)
				->with('countdiagpregunta3no', $countdiagpregunta3no)
				->with('countplanpregunta1si', $countplanpregunta1si)
				->with('countplanpregunta2si', $countplanpregunta2si)
				->with('countplanpregunta1no', $countplanpregunta1no)
				->with('countplanpregunta2no', $countplanpregunta2no)
				->with('countexepregunta1si', $countexepregunta1si)
				->with('countexepregunta2si', $countexepregunta2si)
				->with('countexepregunta3si', $countexepregunta3si)
				->with('countexepregunta1no', $countexepregunta1no)
				->with('countexepregunta2no', $countexepregunta2no)
				->with('countexepregunta3no', $countexepregunta3no)
				->with('countclopregunta1si', $countclopregunta1si)
				->with('countclopregunta2si', $countclopregunta2si)
				->with('countclopregunta3si', $countclopregunta3si)
				->with('countclopregunta1no', $countclopregunta1no)
				->with('countclopregunta2no', $countclopregunta2no)
				->with('countclopregunta3no', $countclopregunta3no)

				->with('project', $project)
				->with('cursos', $cursos)
				->with('alumnos', $alumnos)
				->with('profesors',$profesors)
				->with('consultarrutmotivation',$consultarrutmotivation)
				->with('consultarrutdiagnostic',$consultarrutdiagnostic)
				->with('consultarrutplanification',$consultarrutplanification)
				->with('consultarrutexecution',$consultarrutexecution)
				->with('consultarrutclosing',$consultarrutclosing)
				->with('alumnoproyectos', $results);
				}
			else{
				return view('projects.show')
				->with('cursos', $cursos)
				->with('createdmoti',$createdmoti)
				->with('createddiag',$createddiag)
				->with('createdplan',$createdplan)
				->with('createdexec',$createdexec)
				->with('createdclos',$createdclos)
				->with('project', $project)
				->with('alumnos', $alumnos)
				->with('profesors',$profesors)
				->with('consultarrutmotivation',$consultarrutmotivation)
				->with('consultarrutdiagnostic',$consultarrutdiagnostic)
				->with('consultarrutplanification',$consultarrutplanification)
				->with('consultarrutexecution',$consultarrutexecution)
				->with('consultarrutclosing',$consultarrutclosing)
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
