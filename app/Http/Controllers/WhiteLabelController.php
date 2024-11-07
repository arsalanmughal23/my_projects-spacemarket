<?php

namespace App\Http\Controllers;

use App\DataTables\WhiteLabelDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateWhiteLabelRequest;
use App\Http\Requests\UpdateWhiteLabelRequest;
use App\Repositories\WhiteLabelRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class WhiteLabelController extends AppBaseController
{
    /** @var WhiteLabelRepository $whiteLabelRepository*/
    private $whiteLabelRepository;

    public function __construct(WhiteLabelRepository $whiteLabelRepo)
    {
        $this->middleware('auth');
        $this->whiteLabelRepository = $whiteLabelRepo;
    }

    /**
     * Display a listing of the WhiteLabel.
     *
     * @param WhiteLabelDataTable $whiteLabelDataTable
     *
     * @return Response
     */
    public function index(WhiteLabelDataTable $whiteLabelDataTable)
    {
        return $whiteLabelDataTable->render('white_labels.index');
    }

    /**
     * Show the form for creating a new WhiteLabel.
     *
     * @return Response
     */
    public function create()
    {
        return view('white_labels.create');
    }

    /**
     * Store a newly created WhiteLabel in storage.
     *
     * @param CreateWhiteLabelRequest $request
     *
     * @return Response
     */
    public function store(CreateWhiteLabelRequest $request)
    {
        $input = $request->all();

        $whiteLabel = $this->whiteLabelRepository->create($input);

        Flash::success('White Label saved successfully.');

        return redirect(route('white_labels.index'));
    }

    /**
     * Display the specified WhiteLabel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $whiteLabel = $this->whiteLabelRepository->find($id);

        if (empty($whiteLabel)) {
            Flash::error('White Label not found');

            return redirect(route('white_labels.index'));
        }

        return view('white_labels.show')->with('whiteLabel', $whiteLabel);
    }

    /**
     * Show the form for editing the specified WhiteLabel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $whiteLabel = $this->whiteLabelRepository->find($id);

        if (empty($whiteLabel)) {
            Flash::error('White Label not found');

            return redirect(route('white_labels.index'));
        }

        return view('white_labels.edit')->with('whiteLabel', $whiteLabel);
    }

    /**
     * Update the specified WhiteLabel in storage.
     *
     * @param int $id
     * @param UpdateWhiteLabelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWhiteLabelRequest $request)
    {
        $whiteLabel = $this->whiteLabelRepository->find($id);

        if (empty($whiteLabel)) {
            Flash::error('White Label not found');

            return redirect(route('white_labels.index'));
        }

        $whiteLabel = $this->whiteLabelRepository->update($request->all(), $id);

        Flash::success('White Label updated successfully.');

        return redirect(route('white_labels.index'));
    }

    /**
     * Remove the specified WhiteLabel from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $whiteLabel = $this->whiteLabelRepository->find($id);

        if (empty($whiteLabel)) {
            Flash::error('White Label not found');

            return redirect(route('white_labels.index'));
        }

        $this->whiteLabelRepository->delete($id);

        Flash::success('White Label deleted successfully.');

        return redirect(route('white_labels.index'));
    }
}
