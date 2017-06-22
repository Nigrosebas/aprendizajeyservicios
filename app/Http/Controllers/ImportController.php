<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Alumno;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Input;
use App\Libraries\Repositories\AlumnoRepository;
use DB;
use Mitul\Controller\AppBaseController as AppBaseController;
use Exception;
use Response;
use Flash;
use Auth;

class ImportController extends AppBaseController
{
	private $alumnoRepository;

	function __construct(AlumnoRepository $alumnoRepo)
	{
		$this->alumnoRepository = $alumnoRepo;
	}



    public function import()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count())
			{
				foreach ($data as $key => $value) 
				{
					$insert[] = ['rut' => $value->rut_alumno,'rol'=>'Alumno','usuario'=> $value->rut_alumno,'password' => bcrypt($value->rut_alumno)];
					$insert2[]= ['rut_alumno' => $value->rut_alumno,'nombre' => $value->nombre,'email' => $value->email];
					
				}
				if(!empty($insert))
				{
					try{
					DB::table('usuarios')->insert($insert);
					DB::table('alumnos')->insert($insert2);
					Flash::success('Alumnos creados en el sistema');
							return redirect(route('inicio.index'));
					}catch(Exception $exception)
        				{
        					Flash::warning('Existen Alumnos ya ingresados en el sistema, verifique que los que ingresa en el Archivo CSV sean solo nuevos');
							return redirect(route('inicio.index'));
    					}
				}
			}
		return back();
		}
	}

	public function downloadExcel($type)
	{
		Excel::create('alumnos', function($excel) 
			{
				$excel->sheet('mySheet', function($sheet)
	        		{
						$sheet->row(1, array(
						     'rut_alumno', 'nombre','email'
						));
	        		});
			})->download($type);
	}

	public function importProfesor()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count())
			{
				foreach ($data as $key => $value) 
				{
					$insert3[] = ['rut' => $value->rut_profesor,'rol'=>'Profesor','usuario'=> $value->rut_profesor,'password' => bcrypt($value->rut_profesor)];
					$insert4[]= ['rut_profesor' => $value->rut_profesor,'id_university' => Auth::user()->coordinador->id_university ,'nombre' => $value->nombre,'email' => $value->email];
					
				}
				if(!empty($insert3))
				{
					try{
					DB::table('usuarios')->insert($insert3);
					DB::table('profesors')->insert($insert4);
					Flash::success('Profesores creados exitosamente');
							return redirect(route('inicio.index'));
					}catch(Exception $exception)
        				{
        					Flash::warning('Existen Profesores ya ingresados en el sistema, verifique que los que ingresa en el Archivo CSV sean solo nuevos');
							return redirect(route('inicio.index'));
    					}
				}
			}
		return back();
		}
	}

	public function downloadExcelProfesor($type)
	{
		Excel::create('profesores', function($excel) 
			{
				$excel->sheet('mySheet', function($sheet)
	        		{
						$sheet->row(1, array(
						     'rut_profesor', 'nombre','email'
						));
	        		});
			})->download($type);
	}

	public function importCursos()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count())
			{
				foreach ($data as $key => $value) 
				{
					$insert5[] = ['nombre_carrera' => $value->nombre_carrera, 'id_university' => Auth::user()->coordinador->id_university ];
				}
				if(!empty($insert5))
				{
					try{
					DB::table('courses')->insert($insert5);
					Flash::success('Cursos creados exitosamente');
							return redirect(route('inicio.index'));
					}catch(Exception $exception)
        				{
        					Flash::warning('Existen Cursos ya ingresados en el sistema, verifique que los que ingresa en el Archivo CSV sean solo nuevos');
							return redirect(route('inicio.index'));
    					}
				}
			}
		return back();
		}
	}

	public function downloadExcelCursos($type)
	{
		Excel::create('carreras_universidad', function($excel) 
			{
				$excel->sheet('mySheet', function($sheet)
	        		{
						$sheet->row(1, array(
						     'nombre_carrera'
						));
	        		});
			})->download($type);
	}



}