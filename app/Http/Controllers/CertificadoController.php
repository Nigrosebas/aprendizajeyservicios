<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCertificadoRequest;
use App\Http\Requests\UpdateCertificadoRequest;
use App\Libraries\Repositories\CertificadoRepository;
use Flash;
use App\Models\Certificado;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response,Auth;
use DB;

class CertificadoController extends AppBaseController
{

	/** @var  CertificadoRepository */
	private $certificadoRepository;

	function __construct(CertificadoRepository $certificadoRepo)
	{
		$this->certificadoRepository = $certificadoRepo;
	}

	/**
	 * Display a listing of the Certificado.
	 *
	 * @return Response
	 */
	public function index()
	{
		$certificados = $this->certificadoRepository->paginate(10);

		return view('certificados.index')
			->with('certificados', $certificados);
	}

	public function mostrar($id)
	{
		//$certificados = $this->certificadoRepository->findAllBy('id_alumno',$id);
		$certificados= Certificado::where('id_alumno', '=', $id)->paginate(15);
		if(empty($certificados))
		{
			Flash::error('Certificado no encontrado');

			return redirect(route('certificados.index'));
		}

		return view('certificados.index')
			->with('certificados', $certificados);
	}

	/**
	 * Show the form for creating a new Certificado.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('certificados.create');
	}

	/**
	 * Store a newly created Certificado in storage.
	 *
	 * @param CreateCertificadoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCertificadoRequest $request)
	{
		$input = $request->all();

		$certificado = $this->certificadoRepository->create($input);

		Flash::success('Certificado guardado correctamente.');

		return redirect(route('certificados.mostrar',[Auth::user()->alumno->id]));
	}

	/**
	 * Display the specified Certificado.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$certificado = $this->certificadoRepository->find($id);

		if(empty($certificado))
		{
			Flash::error('Certificado no encontrado');

			return redirect(route('certificados.index'));
		}

		return view('certificados.show')->with('certificado', $certificado);
	}

	/**
	 * Show the form for editing the specified Certificado.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$certificado = $this->certificadoRepository->find($id);

		if(empty($certificado))
		{
			Flash::error('Certificado no encontrado');

			return redirect(route('certificados.index'));
		}

		return view('certificados.edit')->with('certificado', $certificado);
	}

	/**
	 * Update the specified Certificado in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCertificadoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCertificadoRequest $request)
	{
		$certificado = $this->certificadoRepository->find($id);

		if(empty($certificado))
		{
			Flash::error('Certificado no encontrado');

					return redirect(route('certificados.mostrar',[Auth::user()->alumno->id]));
		}

		$this->certificadoRepository->updateRich($request->all(), $id);

		Flash::success('Certificado actualizado correctamente.');

				return redirect(route('certificados.mostrar',[Auth::user()->alumno->id]));
	}

	/**
	 * Remove the specified Certificado from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$certificado = $this->certificadoRepository->find($id);

		if(empty($certificado))
		{
			Flash::error('Certificado no encontrado');

			return redirect(route('certificados.index'));
		}

		$this->certificadoRepository->delete($id);

		Flash::success('Certificado borrado correctamente.');

		return redirect(route('certificados.mostrar',[Auth::user()->alumno->id]));
	}
}
