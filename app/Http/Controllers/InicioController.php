<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Flash;
use App\Libraries\Repositories\CourseRepository;
use App\Libraries\Repositories\ProjectRepository;
use App\Libraries\Repositories\AlumnoProyectoRepository;
use App\Libraries\Repositories\FacultyRepository;
use App\Libraries\Repositories\BackgroundRepository;
use App\Libraries\Repositories\CoordinadorRepository;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Course;
use App\Models\Project;
use App\Models\AlumnoProyecto;
use App\Models\Faculty;
use App\Models\Coordinador;
use App\Models\Background;
use Auth;
use DB;



class InicioController extends AppBaseController
{
    private $courseRepository;
    private $projectRepository;
    private $alumnoProyectoRepository;
    private $facultyRepository;
    private $backgroundRepository;

    function __construct(CourseRepository $courseRepo,ProjectRepository $projectRepo,AlumnoProyectoRepository $alumnoProyectoRepo,FacultyRepository $facultyRepo, BackgroundRepository $backgroundRepo,CoordinadorRepository $coordinadorRepo)
    {
        $this->courseRepository = $courseRepo;
        $this->projectRepository = $projectRepo;
        $this->alumnoProyectoRepository = $alumnoProyectoRepo;
        $this->facultyRepository = $facultyRepo;
        $this->backgroundRepository = $backgroundRepo;
        $this->coordinadorRepository = $coordinadorRepo;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {   
        $alumnoproyectos = $this->alumnoProyectoRepository->paginate(200);
        $courses = $this->courseRepository->paginate(20);
        $projects = $this->projectRepository->paginate(20);
        $faculties = $this->facultyRepository->paginate(10);
        $countproyectosvigentes = Project::where('estado','=','Vigente')->count();
        $countproyectosterminados = Project::where('estado','=','Terminado')->count();
        if(Auth::check()){
            if(Auth::user()->rol=='Coordinador') {
                $idu = Auth::user()->Coordinador->id_university;
                $test = DB::table('courses')->join('projects', 'projects.id_course', '=', 'courses.id')->where('projects.id_university','=',$idu)->select('name_faculty',DB::raw('COUNT(projects.id) as Cantidad'))->groupBy('name_faculty')->get();
                $id = Auth::user()->Coordinador->id_university;
                $faculties= Faculty::where('id_university', '=', $id)->paginate(15);
                $courses= Course::where('id_university', '=', $id)->paginate(15);
                $colorcito = DB::table('backgrounds')->select('code_background')->where('id_university',$idu)->get();
                $colorcito = json_decode(json_encode($colorcito), true);

                return view('welcome')
                ->with('courses', $courses)
                ->with('projects', $projects)
                ->with('test',$test)
                ->with('alumnoproyectos', $alumnoproyectos)
                ->with('countproyectosvigentes',$countproyectosvigentes)
                ->with('countproyectosterminados',$countproyectosterminados)
                ->with('colorcito',$colorcito)
                ->with('faculties', $faculties);

            }
            if(Auth::user()->rol=='Profesor') {
                $idu = Auth::user()->Profesor->id_university;
                $coordinador = DB::table('coordinadors')->where('id_university',$idu)->select('nombre','email')->get();
                $colorcito = DB::table('backgrounds')->select('code_background')->where('id_university',$idu)->get();
                $colorcito = json_decode(json_encode($colorcito), true);

                return view('welcome')
                ->with('courses', $courses)
                ->with('projects', $projects)
                ->with('alumnoproyectos', $alumnoproyectos)
                ->with('countproyectosvigentes',$countproyectosvigentes)
                ->with('countproyectosterminados',$countproyectosterminados)
                ->with('colorcito',$colorcito)
                ->with('coordinador',$coordinador)
                ->with('faculties', $faculties);
            }
            if(Auth::user()->rol=='Alumno') {
                $idu = Auth::user()->Alumno->id_university;
                $coordinador = DB::table('coordinadors')->where('id_university',$idu)->select('nombre','email')->get();
                $colorcito = DB::table('backgrounds')->select('code_background')->where('id_university',$idu)->get();
                $colorcito = json_decode(json_encode($colorcito), true);

                return view('welcome')
                ->with('courses', $courses)
                ->with('projects', $projects)
                ->with('alumnoproyectos', $alumnoproyectos)
                ->with('countproyectosvigentes',$countproyectosvigentes)
                ->with('countproyectosterminados',$countproyectosterminados)
                ->with('coordinador',$coordinador)
                ->with('colorcito',$colorcito)
                ->with('faculties', $faculties);
            }
            if(Auth::user()->rol=='Administrador') {
                $colorcito = DB::table('backgrounds')->select('code_background')->where('id_university',random_int(1,30))->get();
                $colorcito = json_decode(json_encode($colorcito), true);
                return view('welcome')
                ->with('colorcito',$colorcito)
                ->with('countproyectosvigentes',$countproyectosvigentes)
                ->with('countproyectosterminados',$countproyectosterminados);
            }


        }
        //dd($alumnoproyectos,$courses,$projects,$faculties,$countproyectosvigentes,$countproyectosterminados);
        return view('welcome')
        ->with('courses', $courses)
        ->with('projects', $projects)
        ->with('alumnoproyectos', $alumnoproyectos)
        ->with('countproyectosvigentes',$countproyectosvigentes)
        ->with('countproyectosterminados',$countproyectosterminados)
        ->with('faculties', $faculties);

    }
}