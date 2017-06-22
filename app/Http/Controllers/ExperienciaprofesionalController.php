<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateExperienciaprofesionalRequest;
use App\Http\Requests\UpdateExperienciaprofesionalRequest;
use App\Libraries\Repositories\ExperienciaprofesionalRepository;
use Flash,Auth;
use App\Models\Experienciaprofesional;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ExperienciaprofesionalController extends AppBaseController
{

	/** @var  ExperienciaprofesionalRepository */
	private $experienciaprofesionalRepository;

	function __construct(ExperienciaprofesionalRepository $experienciaprofesionalRepo)
	{
		$this->experienciaprofesionalRepository = $experienciaprofesionalRepo;
	}

	/**
	 * Display a listing of the Experienciaprofesional.
	 *
	 * @return Response
	 */
	public function index()
	{
		$experienciaprofesionals = $this->experienciaprofesionalRepository->paginate(10);

		return view('experienciaprofesionals.index')
			->with('experienciaprofesionals', $experienciaprofesionals);
	}

	public function mostrar($id)
	{

		$experienciaprofesionals= Experienciaprofesional::where('id_alumno', '=', $id)->paginate(15);
		if(empty($experienciaprofesionals))
		{
			Flash::error('Experiencia no encontrada');

			return redirect(route('experienciaprofesionals.index'));
		}

		return view('experienciaprofesionals.index')
			->with('experienciaprofesionals', $experienciaprofesionals);
	}

	/**
	 * Show the form for creating a new Experienciaprofesional.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('experienciaprofesionals.create');
	}

	/**
	 * Store a newly created Experienciaprofesional in storage.
	 *
	 * @param CreateExperienciaprofesionalRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateExperienciaprofesionalRequest $request)
	{
		$input = $request->all();

		$experienciaprofesional = $this->experienciaprofesionalRepository->create($input);

		Flash::success('Experiencia Profesional guardada correctamente.');

		return redirect(route('experienciaprofesionals.mostrar',[Auth::user()->alumno->id]));
	}

	/**
	 * Display the specified Experienciaprofesional.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$experienciaprofesional = $this->experienciaprofesionalRepository->find($id);

		if(empty($experienciaprofesional))
		{
			Flash::error('Experiencia no encontrada');

			return redirect(route('experienciaprofesionals.index'));
		}

		return view('experienciaprofesionals.show')->with('experienciaprofesional', $experienciaprofesional);
	}

	/**
	 * Show the form for editing the specified Experienciaprofesional.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$experienciaprofesional = $this->experienciaprofesionalRepository->find($id);

		if(empty($experienciaprofesional))
		{
			Flash::error('Experiencia no encontrada');

			return redirect(route('experienciaprofesionals.index'));
		}

		return view('experienciaprofesionals.edit')->with('experienciaprofesional', $experienciaprofesional);
	}

	/**
	 * Update the specified Experienciaprofesional in storage.
	 *
	 * @param  int              $id
	 * @param UpdateExperienciaprofesionalRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateExperienciaprofesionalRequest $request)
	{
		$experienciaprofesional = $this->experienciaprofesionalRepository->find($id);

		if(empty($experienciaprofesional))
		{
			Flash::error('Experiencia no encontrada');

			return redirect(route('experienciaprofesionals.index'));
		}

		$this->experienciaprofesionalRepository->updateRich($request->all(), $id);

		Flash::success('Experiencia actualizada correctamente.');

		return redirect(route('experienciaprofesionals.mostrar',[Auth::user()->alumno->id]));
	}

	/**
	 * Remove the specified Experienciaprofesional from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$experienciaprofesional = $this->experienciaprofesionalRepository->find($id);

		if(empty($experienciaprofesional))
		{
			Flash::error('Experiencia no encontrada');

			return redirect(route('experienciaprofesionals.index'));
		}

		$this->experienciaprofesionalRepository->delete($id);

		Flash::success('Experiencia borrada correctamente');

		return redirect(route('experienciaprofesionals.mostrar',[Auth::user()->alumno->id]));
	}
}
