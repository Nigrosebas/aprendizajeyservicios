<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBackgroundRequest;
use App\Http\Requests\UpdateBackgroundRequest;
use App\Libraries\Repositories\BackgroundRepository;
use Flash;
use App\Models\Background;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use DB;

class BackgroundController extends AppBaseController
{

	/** @var  BackgroundRepository */
	private $backgroundRepository;

	function __construct(BackgroundRepository $backgroundRepo)
	{
		$this->backgroundRepository = $backgroundRepo;
	}

	/**
	 * Display a listing of the Background.
	 *
	 * @return Response
	 */
	public function index()
	{
		$backgrounds = $this->backgroundRepository->paginate(10);

		return view('backgrounds.index')
			->with('backgrounds', $backgrounds);
	}

	/**
	 * Show the form for creating a new Background.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('backgrounds.create');
	}

	/**
	 * Store a newly created Background in storage.
	 *
	 * @param CreateBackgroundRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBackgroundRequest $request)
	{
		$input = $request->all();
		$id_u = $input['id_university'];
		$consulta = DB::table('backgrounds')->select('id')->where('id_university',$id_u)->get();
		$consulta = json_decode(json_encode($consulta), true);
		if (empty($consulta))
		{
			$background = Background::create($input);
		}
		else
		{
			foreach ($consulta as $consult) {
			$this->backgroundRepository->delete($consult);
			}
			$background = Background::create($input);
		}
	}

	/**
	 * Display the specified Background.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$background = $this->backgroundRepository->find($id);

		if(empty($background))
		{
			Flash::error('Background not found');

			return redirect(route('backgrounds.index'));
		}

		return view('backgrounds.show')->with('background', $background);
	}

	/**
	 * Show the form for editing the specified Background.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$background = $this->backgroundRepository->find($id);

		if(empty($background))
		{
			Flash::error('Background not found');

			return redirect(route('backgrounds.index'));
		}

		return view('backgrounds.edit')->with('background', $background);
	}

	/**
	 * Update the specified Background in storage.
	 *
	 * @param  int              $id
	 * @param UpdateBackgroundRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateBackgroundRequest $request)
	{
		$background = $this->backgroundRepository->find($id);

		if(empty($background))
		{
			Flash::error('Background not found');

			return redirect(route('backgrounds.index'));
		}

		$this->backgroundRepository->updateRich($request->all(), $id);

		Flash::success('Background updated successfully.');

		return redirect(route('backgrounds.index'));
	}

	/**
	 * Remove the specified Background from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$background = $this->backgroundRepository->find($id);

		if(empty($background))
		{
			Flash::error('Background not found');

			return redirect(route('backgrounds.index'));
		}

		$this->backgroundRepository->delete($id);

		Flash::success('Background deleted successfully.');

		return redirect(route('backgrounds.index'));
	}
}
