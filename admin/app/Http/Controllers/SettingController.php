<?php

namespace App\Http\Controllers;

use App\DataTables\SettingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Repositories\SettingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class SettingController extends AppBaseController
{
    /** @var SettingRepository $settingRepository*/
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    public function createOrEdit()
    {
        $setting = $this->settingRepository->model()::orderBy('id', 'desc')->first();

        if (!$setting) {
            Flash::error('Setting not found');
            return redirect()->back();
        }

        return view('settings.edit')->with('setting', $setting);
    }

    public function storeOrUpdate(UpdateSettingRequest $request)
    {
        $setting = $this->settingRepository->model()::orderBy('id', 'desc')->first();

        if (!$setting) {
            Flash::error('Setting not found');
            return redirect()->back();
        }

        $setting = $this->settingRepository->update($request->all(), $setting->id);

        Flash::success('Setting updated successfully.');

        return redirect()->back();
    }

    /**
     * Display a listing of the Setting.
     *
     * @param SettingDataTable $settingDataTable
     *
     * @return Response
     */
    // public function index(SettingDataTable $settingDataTable)
    public function index(Request $request)
    {
        return abort(404);
        // return $settingDataTable->render('settings.index');
    }

    /**
     * Show the form for creating a new Setting.
     *
     * @return Response
     */
    public function create()
    {
        return abort(404);
        // return view('settings.create');
    }

    /**
     * Store a newly created Setting in storage.
     *
     * @param CreateSettingRequest $request
     *
     * @return Response
     */
    // public function store(CreateSettingRequest $request)
    public function store(Request $request)
    {
        return abort(404);
        // $input = $request->all();

        // $setting = $this->settingRepository->create($input);

        // Flash::success('Setting saved successfully.');

        // return redirect()->back();
    }

    /**
     * Display the specified Setting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error('Setting not found');

            return redirect()->back();
        }

        return view('settings.show')->with('setting', $setting);
    }

    /**
     * Show the form for editing the specified Setting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        return abort(404);
        // $setting = $this->settingRepository->find($id);

        // if (empty($setting)) {
        //     Flash::error('Setting not found');

        //     return redirect()->back();
        // }

        // return view('settings.edit')->with('setting', $setting);
    }

    /**
     * Update the specified Setting in storage.
     *
     * @param int $id
     * @param UpdateSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSettingRequest $request)
    {
        return abort(404);
        // $setting = $this->settingRepository->find($id);

        // if (empty($setting)) {
        //     Flash::error('Setting not found');

        //     return redirect()->back();
        // }

        // $setting = $this->settingRepository->update($request->all(), $id);

        // Flash::success('Setting updated successfully.');

        // return redirect()->back();
    }

    /**
     * Remove the specified Setting from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        return abort(404);
        // $setting = $this->settingRepository->find($id);

        // if (empty($setting)) {
        //     Flash::error('Setting not found');

        //     return redirect()->back();
        // }

        // $this->settingRepository->delete($id);

        // Flash::success('Setting deleted successfully.');

        // return redirect()->back();
    }
}
