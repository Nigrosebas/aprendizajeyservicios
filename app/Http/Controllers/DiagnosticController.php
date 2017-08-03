<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDiagnosticRequest;
use App\Http\Requests\UpdateDiagnosticRequest;
use App\Libraries\Repositories\DiagnosticRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class DiagnosticController extends AppBaseController
{

	/** @var  DiagnosticRepository */
	private $diagnosticRepository;

	function __construct(DiagnosticRepository $diagnosticRepo)
	{
		$this->diagnosticRepository = $diagnosticRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Diagnostic.
	 *
	 * @return Response
	 */
	public function index()
	{
		$diagnostics = $this->diagnosticRepository->paginate(10);

		return view('diagnostics.index')
			->with('diagnostics', $diagnostics);
	}

	/**
	 * Show the form for creating a new Diagnostic.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('diagnostics.create');
	}

	/**
	 * Store a newly created Diagnostic in storage.
	 *
	 * @param CreateDiagnosticRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDiagnosticRequest $request)
	{
		$input = $request->all();

		$diagnostic = $this->diagnosticRepository->create($input);

		Flash::success('Diagnostic saved successfully.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Display the specified Diagnostic.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$diagnostic = $this->diagnosticRepository->find($id);

		if(empty($diagnostic))
		{
			Flash::error('Diagnostic not found');

			return redirect(route('diagnostics.index'));
		}

		return view('diagnostics.show')->with('diagnostic', $diagnostic);
	}

	/**
	 * Show the form for editing the specified Diagnostic.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$diagnostic = $this->diagnosticRepository->find($id);

		if(empty($diagnostic))
		{
			Flash::error('Diagnostic not found');

			return redirect(route('inicio.index'));
		}

		return view('diagnostics.edit')->with('diagnostic', $diagnostic);
	}

	/**
	 * Update the specified Diagnostic in storage.
	 *
	 * @param  int              $id
	 * @param UpdateDiagnosticRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateDiagnosticRequest $request)
	{
		$diagnostic = $this->diagnosticRepository->find($id);

		if(empty($diagnostic))
		{
			Flash::error('Diagnostic not found');

			return redirect(route('inicio.index'));
		}

		$this->diagnosticRepository->updateRich($request->all(), $id);

		Flash::success('Diagnostic updated successfully.');

		return redirect(route('inicio.index'));
	}

	/**
	 * Remove the specified Diagnostic from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$diagnostic = $this->diagnosticRepository->find($id);

		if(empty($diagnostic))
		{
			Flash::error('Diagnostic not found');

			return redirect(route('inicio.index'));
		}

		$this->diagnosticRepository->delete($id);

		Flash::success('Diagnostic deleted successfully.');

		return redirect(route('inicio.index'));
	}
}
