<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Flash;
use App\Libraries\Repositories\CourseRepository;
use App\Libraries\Repositories\ProjectRepository;
use App\Libraries\Repositories\AlumnoProyectoRepository;
use App\Libraries\Repositories\FacultyRepository;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Course;
use App\Models\Project;
use App\Models\AlumnoProyecto;
use App\Models\Faculty;
use Auth;



class InicioController extends AppBaseController
{
    private $courseRepository;
    private $projectRepository;
    private $alumnoProyectoRepository;
    private $facultyRepository;

    function __construct(CourseRepository $courseRepo,ProjectRepository $projectRepo,AlumnoProyectoRepository $alumnoProyectoRepo,FacultyRepository $facultyRepo)
    {
        $this->courseRepository = $courseRepo;
        $this->projectRepository = $projectRepo;
        $this->alumnoProyectoRepository = $alumnoProyectoRepo;
        $this->facultyRepository = $facultyRepo;
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
        if(Auth::check()){
            if(Auth::user()->rol=='Coordinador') {
            $id = Auth::user()->Coordinador->id_university;
            $faculties= Faculty::where('id_university', '=', $id)->paginate(15);
            $courses= Course::where('id_university', '=', $id)->paginate(15);
            }
        }
        return view('welcome')
        ->with('courses', $courses)
        ->with('projects', $projects)
        ->with('alumnoproyectos', $alumnoproyectos)
        ->with('faculties', $faculties);
    }
}