<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePermissionsRequest;
use App\Http\Requests\UpdatePermissionsRequest;
use App\Repositories\PermissionsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PermissionsController extends AppBaseController
{
    /** @var PermissionsRepository $permissionsRepository*/
    private $permissionsRepository;

    public function __construct(PermissionsRepository $permissionsRepo)
    {
        $this->permissionsRepository = $permissionsRepo;
    }

    /**
     * Display a listing of the Permissions.
     *
     * @param PermissionsDataTable $permissionsDataTable
     *
     * @return Response
     */
    public function index(PermissionsDataTable $permissionsDataTable)
    {
        return $permissionsDataTable->render('permissions.index');
    }

    /**
     * Show the form for creating a new Permissions.
     *
     * @return Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created Permissions in storage.
     *
     * @param CreatePermissionsRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionsRequest $request)
    {
        $input = $request->all();

        $permissions = $this->permissionsRepository->create($input);

        Flash::success('Permissions saved successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Display the specified Permissions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permissions = $this->permissionsRepository->find($id);

        if (empty($permissions)) {
            Flash::error('Permissions not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.show')->with('permissions', $permissions);
    }

    /**
     * Show the form for editing the specified Permissions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permissions = $this->permissionsRepository->find($id);

        if (empty($permissions)) {
            Flash::error('Permissions not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.edit')->with('permissions', $permissions);
    }

    /**
     * Update the specified Permissions in storage.
     *
     * @param int $id
     * @param UpdatePermissionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionsRequest $request)
    {
        $permissions = $this->permissionsRepository->find($id);

        if (empty($permissions)) {
            Flash::error('Permissions not found');

            return redirect(route('permissions.index'));
        }

        $permissions = $this->permissionsRepository->update($request->all(), $id);

        Flash::success('Permissions updated successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Remove the specified Permissions from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permissions = $this->permissionsRepository->find($id);

        if (empty($permissions)) {
            Flash::error('Permissions not found');

            return redirect(route('permissions.index'));
        }

        $this->permissionsRepository->delete($id);

        Flash::success('Permissions deleted successfully.');

        return redirect(route('permissions.index'));
    }
}
