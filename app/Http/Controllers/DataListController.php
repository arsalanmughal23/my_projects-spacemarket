<?php

namespace App\Http\Controllers;

use App\DataTables\DataListDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDataListRequest;
use App\Http\Requests\UpdateDataListRequest;
use App\Repositories\DataListRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\DataList;
use Response;

class DataListController extends AppBaseController
{
    /** @var DataListRepository $dataListRepository*/
    private $dataListRepository;

    public function __construct(DataListRepository $dataListRepo)
    {
        $this->middleware('auth');
        $this->dataListRepository = $dataListRepo;
    }

    /**
     * Display a listing of the DataList.
     *
     * @param DataListDataTable $dataListDataTable
     *
     * @return Response
     */
    public function index(DataListDataTable $dataListDataTable)
    {
        return $dataListDataTable->render('data_lists.index');
    }

    /**
     * Show the form for creating a new DataList.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_lists.create');
    }

    /**
     * Store a newly created DataList in storage.
     *
     * @param CreateDataListRequest $request
     *
     * @return Response
     */
    public function store(CreateDataListRequest $request)
    {
        $input = $request->all();

        if(!isDataListCreatable($request->type)){
            $recordLimit = config('constants.maximum_limit.data_list___'.$request->type, 0);
            Flash::error(__('general.data_list.'.$request->type) . ' maximum limit is '.$recordLimit);
            return redirect(route('data_lists.index'));
        }

        $dataList = $this->dataListRepository->create($input);

        Flash::success('Data List saved successfully.');

        return redirect(route('data_lists.index'));
    }

    /**
     * Display the specified DataList.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataList = $this->dataListRepository->find($id);

        if (empty($dataList)) {
            Flash::error('Data List not found');

            return redirect(route('data_lists.index'));
        }

        return view('data_lists.show')->with('dataList', $dataList);
    }

    /**
     * Show the form for editing the specified DataList.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataList = $this->dataListRepository->find($id);

        if (empty($dataList)) {
            Flash::error('Data List not found');

            return redirect(route('data_lists.index'));
        }

        return view('data_lists.edit')->with('dataList', $dataList);
    }

    /**
     * Update the specified DataList in storage.
     *
     * @param int $id
     * @param UpdateDataListRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataListRequest $request)
    {
        $dataList = $this->dataListRepository->find($id);

        if (empty($dataList)) {
            Flash::error('Data List not found');

            return redirect(route('data_lists.index'));
        }

        $dataList = $this->dataListRepository->update($request->all(), $id);

        Flash::success('Data List updated successfully.');

        return redirect(route('data_lists.index'));
    }

    /**
     * Remove the specified DataList from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataList = $this->dataListRepository->find($id);

        if (empty($dataList)) {
            Flash::error('Data List not found');

            return redirect(route('data_lists.index'));
        }

        if(!isDataListDeleteable($dataList->type)){
            $recordLimit = config('constants.minimum_limit.data_list___'.$dataList->type, 0);
            Flash::error(__('general.data_list.'.$dataList->type) . ' minimum limit is '.$recordLimit);
            return redirect(route('data_lists.index'));
        }

        $this->dataListRepository->delete($id);

        Flash::success('Data List deleted successfully.');

        return redirect(route('data_lists.index'));
    }
}
