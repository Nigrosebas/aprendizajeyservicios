<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFormacionacademicaRequest;
use App\Http\Requests\UpdateFormacionacademicaRequest;
use App\Libraries\Repositories\FormacionacademicaRepository;
use Flash,Auth;
use App\Models\Formacionacademica;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class FormacionacademicaController extends AppBaseController
{

	/** @var  FormacionacademicaRepository */
	private $formacionacademicaRepository;

	function __construct(FormacionacademicaRepository $formacionacademicaRepo)
	{
		$this->formacionacademicaRepository = $formacionacademicaRepo;
	}

	/**
	 * Display a listing of the Formacionacademica.
	 *
	 * @return Response
	 */
	public function index()
	{
		$formacionacademicas = $this->formacionacademicaRepository->paginate(10);

		return view('formacionacademicas.index')
			->with('formacionacademicas', $formacionacademicas);
	}

	public function mostrar($id)
	{

		$formacionacademicas= Formacionacademica::where('id_alumno', '=', $id)->paginate(15);
		if(empty($formacionacademicas))
		{
			Flash::error('Formaciones Académicas no encontradas');

			return redirect(route('formacionacademicas.index'));
		}

		return view('formacionacademicas.index')
			->with('formacionacademicas', $formacionacademicas);
	}

	/**
	 * Show the form for creating a new Formacionacademica.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('formacionacademicas.create');
	}

	/**
	 * Store a newly created Formacionacademica in storage.
	 *
	 * @param CreateFormacionacademicaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFormacionacademicaRequest $request)
	{
		$input = $request->all();

		$formacionacademica = $this->formacionacademicaRepository->create($input);

		Flash::success('Formación Académica guardada correctamente.');

		return redirect(route('formacionacademicas.mostrar',[Auth::user()->alumno->id]));
	}

	/**
	 * Display the specified Formacionacademica.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$formacionacademica = $this->formacionacademicaRepository->find($id);

		if(empty($formacionacademica))
		{
			Flash::error('Formaciones Académicas no encontradas');

			return redirect(route('formacionacademicas.index'));
		}

		return view('formacionacademicas.show')->with('formacionacademica', $formacionacademica);
	}

	/**
	 * Show the form for editing the specified Formacionacademica.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$formacionacademica = $this->formacionacademicaRepository->find($id);

		if(empty($formacionacademica))
		{
			Flash::error('Formaciones Académicas no encontradas');

			return redirect(route('formacionacademicas.index'));
		}

		return view('formacionacademicas.edit')->with('formacionacademica', $formacionacademica);
	}

	/**
	 * Update the specified Formacionacademica in storage.
	 *
	 * @param  int              $id
	 * @param UpdateFormacionacademicaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateFormacionacademicaRequest $request)
	{
		$formacionacademica = $this->formacionacademicaRepository->find($id);

		if(empty($formacionacademica))
		{
			Flash::error('Formaciones Académicas no encontradas');

			return redirect(route('formacionacademicas.index'));
		}

		$this->formacionacademicaRepository->updateRich($request->all(), $id);

		Flash::success('Formación Académica actualizada correctamente.');

		return redirect(route('formacionacademicas.mostrar',[Auth::user()->alumno->id]));
	}

	/**
	 * Remove the specified Formacionacademica from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$formacionacademica = $this->formacionacademicaRepository->find($id);

		if(empty($formacionacademica))
		{
			Flash::error('Formaciones Académicas no encontradas');

			return redirect(route('formacionacademicas.index'));
		}

		$this->formacionacademicaRepository->delete($id);

		Flash::success('Formación Académica borrada correctamente');

		return redirect(route('formacionacademicas.mostrar',[Auth::user()->alumno->id]));
	}
}
