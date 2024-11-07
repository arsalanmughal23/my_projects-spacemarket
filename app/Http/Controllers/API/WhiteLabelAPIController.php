<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWhiteLabelAPIRequest;
use App\Http\Requests\API\UpdateWhiteLabelAPIRequest;
use App\Models\WhiteLabel;
use App\Repositories\WhiteLabelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class WhiteLabelController
 * @package App\Http\Controllers\API
 */

class WhiteLabelAPIController extends AppBaseController
{
    /** @var  WhiteLabelRepository */
    private $whiteLabelRepository;

    public function __construct(WhiteLabelRepository $whiteLabelRepo)
    {
        $this->whiteLabelRepository = $whiteLabelRepo;
    }

    /**
     * Display a listing of the WhiteLabel.
     * GET|HEAD /white_labels
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
        $white_labels = $this->whiteLabelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($white_labels->toArray(), 'White Labels retrieved successfully');
    }

    /**
     * Store a newly created WhiteLabel in storage.
     * POST /white_labels
     *
     * @param CreateWhiteLabelAPIRequest $request
     *
     * @return Response
     */

    public function store(CreateWhiteLabelAPIRequest $request)
    {
        $input = $request->all();

        $whiteLabel = $this->whiteLabelRepository->create($input);

        return $this->sendResponse($whiteLabel->toArray(), 'White Label saved successfully');
    }

    /**
     * Display the specified WhiteLabel.
     * GET|HEAD /white_labels/{id}
     *
     * @param int $id
     *
     * @return Response
     */

    public function show($id)
    {
        /** @var WhiteLabel $whiteLabel */
        $whiteLabel = $this->whiteLabelRepository->find($id);

        if (empty($whiteLabel)) {
            return $this->sendError('White Label not found');
        }

        return $this->sendResponse($whiteLabel->toArray(), 'White Label retrieved successfully');
    }

    /**
     * Update the specified WhiteLabel in storage.
     * PUT/PATCH /white_labels/{id}
     *
     * @param int $id
     * @param UpdateWhiteLabelAPIRequest $request
     *
     * @return Response
     */

    public function update($id, UpdateWhiteLabelAPIRequest $request)
    {
        $input = $request->all();

        /** @var WhiteLabel $whiteLabel */
        $whiteLabel = $this->whiteLabelRepository->find($id);

        if (empty($whiteLabel)) {
            return $this->sendError('White Label not found');
        }

        $whiteLabel = $this->whiteLabelRepository->update($input, $id);

        return $this->sendResponse($whiteLabel->toArray(), 'WhiteLabel updated successfully');
    }

    /**
     * Remove the specified WhiteLabel from storage.
     * DELETE /white_labels/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */

    public function destroy($id)
    {
        /** @var WhiteLabel $whiteLabel */
        $whiteLabel = $this->whiteLabelRepository->find($id);

        if (empty($whiteLabel)) {
            return $this->sendError('White Label not found');
        }

        $whiteLabel->delete();

        return $this->sendSuccess('White Label deleted successfully');
    }
}
