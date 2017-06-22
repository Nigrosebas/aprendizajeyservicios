<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateIdiomaRequest;
use App\Http\Requests\UpdateIdiomaRequest;
use App\Libraries\Repositories\IdiomaRepository;
use App\Libraries\Repositories\LenguajeRepository;
use Flash,Auth;
use App\Models\Idioma;
use App\Models\Lenguaje;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class IdiomaController extends AppBaseController
{

	/** @var  IdiomaRepository */
	private $idiomaRepository;
	private $lenguajeRepository;

	function __construct(IdiomaRepository $idiomaRepo,LenguajeRepository $lenguajeRepo)
	{
		$this->idiomaRepository = $idiomaRepo;
		$this->lenguajeRepository = $lenguajeRepo;
	}

	/**
	 * Display a listing of the Idioma.
	 *
	 * @return Response
	 */
	public function index()
	{
		$idiomas = $this->idiomaRepository->paginate(10);

		return view('idiomas.index')
			->with('idiomas', $idiomas);
	}

	public function mostrar($id)
	{

		$idiomas= Idioma::where('id_alumno', '=', $id)->paginate(15);
		if(empty($idiomas))
		{
			Flash::error('Idioma no encontrado');

			return redirect(route('idiomas.index'));
		}

		return view('idiomas.index')
			->with('idiomas', $idiomas);
	}

	/**
	 * Show the form for creating a new Idioma.
	 *
	 * @return Response
	 */
	public function create()
	{

		$lenguajes = Lenguaje::lists('nombre', 'nombre');
		return view('idiomas.create')
			->with('lenguajes', $lenguajes);
	}

	/**
	 * Store a newly created Idioma in storage.
	 *
	 * @param CreateIdiomaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateIdiomaRequest $request)
	{
		$input = $request->all();

		$idioma = $this->idiomaRepository->create($input);

		Flash::success('Idioma guardado correctamente.');

		return redirect(route('idiomas.mostrar',[Auth::user()->alumno->id]));
	}

	/**
	 * Display the specified Idioma.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$idioma = $this->idiomaRepository->find($id);

		if(empty($idioma))
		{
			Flash::error('Idioma no encontrado');

			return redirect(route('idiomas.index'));
		}

		return view('idiomas.show')->with('idioma', $idioma);
	}

	/**
	 * Show the form for editing the specified Idioma.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$idioma = $this->idiomaRepository->find($id);
		$lenguajes = Lenguaje::lists('nombre', 'nombre');

		if(empty($idioma))
		{
			Flash::error('Idioma no encontrado');

			return redirect(route('idiomas.index'));
		}

		return view('idiomas.edit')->with('idioma', $idioma)
		->with('lenguajes', $lenguajes);
	}

	/**
	 * Update the specified Idioma in storage.
	 *
	 * @param  int              $id
	 * @param UpdateIdiomaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateIdiomaRequest $request)
	{
		$idioma = $this->idiomaRepository->find($id);

		if(empty($idioma))
		{
			Flash::error('Idioma no encontrado');

			return redirect(route('idiomas.index'));
		}

		$this->idiomaRepository->updateRich($request->all(), $id);

		Flash::success('Idioma actualizado correctamente.');

		return redirect(route('idiomas.mostrar',[Auth::user()->alumno->id]));
	}

	/**
	 * Remove the specified Idioma from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$idioma = $this->idiomaRepository->find($id);

		if(empty($idioma))
		{
			Flash::error('Idioma no encontrado');

			return redirect(route('idiomas.index'));
		}

		$this->idiomaRepository->delete($id);

		Flash::success('Idioma borrado correctamente.');

		return redirect(route('idiomas.mostrar',[Auth::user()->alumno->id]));
	}
}
