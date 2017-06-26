<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
        require Config::get('generator.path_api_routes');
	});
});

Route::group(['middleware'], function () {

    Route::resource('inicio', 'InicioController');

    Route::resource('usuarios', 'UsuarioController');

    Route::get('usuarios/{id}/delete', [
        'as' => 'usuarios.delete',
        'uses' => 'UsuarioController@destroy',
    ]);


    Route::resource('alumnos', 'AlumnoController');

    Route::get('alumnos/{id}/delete', [
        'as' => 'alumnos.delete',
        'uses' => 'AlumnoController@destroy',
    ]);


    Route::resource('empresas', 'EmpresaController');

    Route::get('empresas/{id}/delete', [
        'as' => 'empresas.delete',
        'uses' => 'EmpresaController@destroy',
    ]);


    Route::resource('formacionacademicas', 'FormacionacademicaController');

    Route::get('formacionacademicas/{id}/delete', [
        'as' => 'formacionacademicas.delete',
        'uses' => 'FormacionacademicaController@destroy',
    ]);
    Route::get('formacionacademicas/{id}/mostrar', [
        'as' => 'formacionacademicas.mostrar',
        'uses' => 'FormacionacademicaController@mostrar',
    ]);


    Route::resource('idiomas', 'IdiomaController');

    Route::get('idiomas/{id}/delete', [
        'as' => 'idiomas.delete',
        'uses' => 'IdiomaController@destroy',
    ]);
    Route::get('idiomas/{id}/mostrar', [
        'as' => 'idiomas.mostrar',
        'uses' => 'IdiomaController@mostrar',
    ]);


    Route::resource('conocimientos', 'ConocimientosController');

    Route::get('conocimientos/{id}/delete', [
        'as' => 'conocimientos.delete',
        'uses' => 'ConocimientosController@destroy',
    ]);
    Route::get('conocimientos/{id}/mostrar', [
        'as' => 'conocimientos.mostrar',
        'uses' => 'ConocimientosController@mostrar',
    ]);


    Route::resource('certificados', 'CertificadoController');

    Route::get('certificados/{id}/delete', [
        'as' => 'certificados.delete',
        'uses' => 'CertificadoController@destroy',
    ]);
    Route::get('certificados/{id}/mostrar', [
        'as' => 'certificados.mostrar',
        'uses' => 'CertificadoController@mostrar',
    ]);



    Route::resource('experienciaprofesionals', 'ExperienciaprofesionalController');

    Route::get('experienciaprofesionals/{id}/delete', [
        'as' => 'experienciaprofesionals.delete',
        'uses' => 'ExperienciaprofesionalController@destroy',
    ]);
    Route::get('experienciaprofesionals/{id}/mostrar', [
        'as' => 'experienciaprofesionals.mostrar',
        'uses' => 'ExperienciaprofesionalController@mostrar',
    ]);


    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    Route::get('auth/login', [
        'as' => 'auth.login',
        'uses' => 'Auth\AuthController@getLogin',
    ]);

    Route::post('auth/login', [
        'as' => 'auth.login',
        'uses' => 'Auth\AuthController@postLogin',
    ]);

    Route::get('auth/logout', [
        'as' => 'auth.logout',
        'uses' => 'Auth\AuthController@getLogout',
    ]);

    Route::resource('profesors', 'ProfesorController');

    Route::get('profesors/{id}/delete', [
        'as' => 'profesors.delete',
        'uses' => 'ProfesorController@destroy',
    ]);


    Route::resource('coordinadors', 'CoordinadorController');

    Route::get('coordinadors/{id}/delete', [
        'as' => 'coordinadors.delete',
        'uses' => 'CoordinadorController@destroy',
    ]);


    Route::resource('lenguajes', 'LenguajeController');

    Route::get('lenguajes/{id}/delete', [
        'as' => 'lenguajes.delete',
        'uses' => 'LenguajeController@destroy',
    ]);

});


Route::resource('solicituds', 'SolicitudController');

Route::get('solicituds/{id}/delete', [
    'as' => 'solicituds.delete',
    'uses' => 'SolicitudController@destroy',
]);
Route::get('solicituds/{id}/mostrar', [
    'as' => 'solicituds.mostrar',
    'uses' => 'SolicitudController@mostrar',
]);


Route::resource('areas', 'AreaController');

Route::get('areas/{id}/delete', [
    'as' => 'areas.delete',
    'uses' => 'AreaController@destroy',
]);


Route::resource('universities', 'UniversityController');

Route::get('universities/{id}/delete', [
    'as' => 'universities.delete',
    'uses' => 'UniversityController@destroy',
]);


Route::resource('courses', 'CourseController');

Route::get('courses/{id}/delete', [
    'as' => 'courses.delete',
    'uses' => 'CourseController@destroy',
]);


Route::get('registro', function () {
    return view('registro');
});


Route::resource('projects', 'ProjectController');

Route::get('projects/{id}/delete', [
    'as' => 'projects.delete',
    'uses' => 'ProjectController@destroy',
]);
Route::get('projects/{id}/mostrar', [
    'as' => 'projects.mostrar',
    'uses' => 'ProjectController@mostrar',
]);

Route::post('importExcel',[
    'as' => 'importExcel',
    'uses' =>'ImportController@import']);
Route::get('downloadExcel/{type}', 'ImportController@downloadExcel');

Route::post('importExcelProfesor',[
    'as' => 'importExcelProfesor',
    'uses' =>'ImportController@importProfesor']);
Route::get('downloadExcelProfesor/{type}', 'ImportController@downloadExcelProfesor');

Route::post('importExcelCursos',[
    'as' => 'importExcelCursos',
    'uses' =>'ImportController@importCursos']);
Route::get('downloadExcelCursos/{type}', 'ImportController@downloadExcelCursos');

Route::resource('alumnoproyectos', 'AlumnoProyectoController');

Route::get('alumnoproyectos/{id}/delete', [
    'as' => 'alumnoproyectos.delete',
    'uses' => 'AlumnoProyectoController@destroy',
]);

Route::post('alumnoproyectos/store', [
    'as' => 'alumnoproyectos.store',
    'uses' => 'AlumnoProyectoController@store',
]);

Route::resource('faculties', 'FacultyController');

Route::get('faculties/{id}/delete', [
    'as' => 'faculties.delete',
    'uses' => 'FacultyController@destroy',
]);


Route::resource('courses', 'CourseController');

Route::get('courses/{id}/delete', [
    'as' => 'courses.delete',
    'uses' => 'CourseController@destroy',
]);


Route::resource('coursealls', 'CourseallController');

Route::get('coursealls/{id}/delete', [
    'as' => 'coursealls.delete',
    'uses' => 'CourseallController@destroy',
]);
