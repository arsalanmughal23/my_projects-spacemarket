<?php

namespace App\Http\Controllers;

use App\DataTables\TradingOptionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTradingOptionRequest;
use App\Http\Requests\UpdateTradingOptionRequest;
use App\Repositories\TradingOptionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TradingOptionController extends AppBaseController
{
    /** @var TradingOptionRepository $tradingOptionRepository*/
    private $tradingOptionRepository;

    public function __construct(TradingOptionRepository $tradingOptionRepo)
    {
        $this->middleware('auth');
        $this->tradingOptionRepository = $tradingOptionRepo;
    }

    /**
     * Display a listing of the TradingOption.
     *
     * @param TradingOptionDataTable $tradingOptionDataTable
     *
     * @return Response
     */
    public function index(TradingOptionDataTable $tradingOptionDataTable)
    {
        return $tradingOptionDataTable->render('trading_options.index');
    }

    /**
     * Show the form for creating a new TradingOption.
     *
     * @return Response
     */
    public function create()
    {
        return view('trading_options.create');
    }

    /**
     * Store a newly created TradingOption in storage.
     *
     * @param CreateTradingOptionRequest $request
     *
     * @return Response
     */
    public function store(CreateTradingOptionRequest $request)
    {
        $input = $request->all();

        $tradingOption = $this->tradingOptionRepository->create($input);

        Flash::success('Trading Option saved successfully.');

        return redirect(route('trading_options.index'));
    }

    /**
     * Display the specified TradingOption.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tradingOption = $this->tradingOptionRepository->find($id);

        if (empty($tradingOption)) {
            Flash::error('Trading Option not found');

            return redirect(route('trading_options.index'));
        }

        return view('trading_options.show')->with('tradingOption', $tradingOption);
    }

    /**
     * Show the form for editing the specified TradingOption.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tradingOption = $this->tradingOptionRepository->find($id);

        if (empty($tradingOption)) {
            Flash::error('Trading Option not found');

            return redirect(route('trading_options.index'));
        }

        return view('trading_options.edit')->with('tradingOption', $tradingOption);
    }

    /**
     * Update the specified TradingOption in storage.
     *
     * @param int $id
     * @param UpdateTradingOptionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTradingOptionRequest $request)
    {
        $tradingOption = $this->tradingOptionRepository->find($id);

        if (empty($tradingOption)) {
            Flash::error('Trading Option not found');

            return redirect(route('trading_options.index'));
        }

        $tradingOption = $this->tradingOptionRepository->update($request->all(), $id);

        Flash::success('Trading Option updated successfully.');

        return redirect(route('trading_options.index'));
    }

    /**
     * Remove the specified TradingOption from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tradingOption = $this->tradingOptionRepository->find($id);

        if (empty($tradingOption)) {
            Flash::error('Trading Option not found');

            return redirect(route('trading_options.index'));
        }

        $this->tradingOptionRepository->delete($id);

        Flash::success('Trading Option deleted successfully.');

        return redirect(route('trading_options.index'));
    }
}
