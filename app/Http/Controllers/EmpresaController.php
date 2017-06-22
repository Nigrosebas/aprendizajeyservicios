<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Libraries\Repositories\EmpresaRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response,Auth;

class EmpresaController extends AppBaseController
{

	/** @var  EmpresaRepository */
	private $empresaRepository;

	function __construct(EmpresaRepository $empresaRepo)
	{
		$this->empresaRepository = $empresaRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Empresa.
	 *
	 * @return Response
	 */
	public function index()
	{
		$empresas = $this->empresaRepository->paginate(10);

		return view('empresas.index')
			->with('empresas', $empresas);
	}

	/**
	 * Show the form for creating a new Empresa.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('empresas.create');
	}

	/**
	 * Store a newly created Empresa in storage.
	 *
	 * @param CreateEmpresaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateEmpresaRequest $request)
	{
		$input = $request->all();

		$empresa = $this->empresaRepository->create($input);

		Flash::success('Empresa guardada correctamente.');

		return redirect(route('empresas.index'));
	}

	/**
	 * Display the specified Empresa.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$empresa = $this->empresaRepository->find($id);

		if(empty($empresa))
		{
			Flash::error('Empresa no encontrada');

			return redirect(route('empresas.index'));
		}

		return view('empresas.show')->with('empresa', $empresa);
	}

	/**
	 * Show the form for editing the specified Empresa.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$empresa = $this->empresaRepository->find($id);

		if(empty($empresa))
		{
			Flash::error('Empresa no encontrada');

			return redirect(route('empresas.index'));
		}

		return view('empresas.edit')->with('empresa', $empresa);
	}

	/**
	 * Update the specified Empresa in storage.
	 *
	 * @param  int              $id
	 * @param UpdateEmpresaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateEmpresaRequest $request)
	{
		$empresa = $this->empresaRepository->find($id);

		if(empty($empresa))
		{
			Flash::error('Empresa no encontrada');

			return redirect(route('empresas.index'));
		}

		$this->empresaRepository->updateRich($request->all(), $id);

		Flash::success('Empresa actualizada correctamente.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Remove the specified Empresa from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$empresa = $this->empresaRepository->find($id);

		if(empty($empresa))
		{
			Flash::error('Empresa no encontrada');

			return redirect(route('empresas.index'));
		}

		$this->empresaRepository->delete($id);

		Flash::success('Empresa borrada correctamente.');

		return redirect(route('empresas.index'));
	}
}
