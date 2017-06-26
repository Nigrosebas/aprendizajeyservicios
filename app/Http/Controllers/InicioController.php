<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Flash;
use App\Libraries\Repositories\CourseRepository;
use App\Libraries\Repositories\ProjectRepository;
use App\Libraries\Repositories\AlumnoProyectoRepository;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Course;
use App\Models\Project;
use App\Models\AlumnoProyecto;



class InicioController extends AppBaseController
{
    private $courseRepository;
    private $projectRepository;
    private $alumnoProyectoRepository;
    function __construct(CourseRepository $courseRepo,ProjectRepository $projectRepo,AlumnoProyectoRepository $alumnoProyectoRepo)
    {
        $this->courseRepository = $courseRepo;
        $this->projectRepository = $projectRepo;
        $this->alumnoProyectoRepository = $alumnoProyectoRepo;
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
        return view('welcome')
        ->with('courses', $courses)
        ->with('projects', $projects)
        ->with('alumnoproyectos', $alumnoproyectos);
    }
}