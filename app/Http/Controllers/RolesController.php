<?php

namespace App\Http\Controllers;

use App\DataTables\RolesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use App\Repositories\RolesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Spatie\Permission\Models\Role as Role;
use Spatie\Permission\Models\Permission as Permission;

class RolesController extends AppBaseController
{
    /** @var RolesRepository $rolesRepository*/
    private $rolesRepository;

    public function __construct(RolesRepository $rolesRepo)
    {
        $this->rolesRepository = $rolesRepo;
    }

    /**
     * Display a listing of the Roles.
     *
     * @param RolesDataTable $rolesDataTable
     *
     * @return Response
     */
    public function index(RolesDataTable $rolesDataTable)
    {
        return $rolesDataTable->render('roles.index');
    }

    /**
     * Show the form for creating a new Roles.
     *
     * @return Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRolesRequest $request
     *
     * @return Response
     */
    public function store(CreateRolesRequest $request)
    {
        $input = $request->all();

        $roles = $this->rolesRepository->create($input);

        Flash::success('Roles saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Roles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified Roles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        $permission_role = Role::findOrFail($id);

        $permissions = Permission::all();

        return view('roles.edit')->with([
            'roles' => $roles,
            'permission_role' => $permission_role,
            'permissions' => $permissions
        ]);
    }

    /**
     * Update the specified Roles in storage.
     *
     * @param int $id
     * @param UpdateRolesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRolesRequest $request)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        $roles = $this->rolesRepository->update($request->all(), $id);

        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            if (isset(request()->permission[$permission->id])) {
                $role->givePermissionTo($permission);
            } else {
                $role->revokePermissionTo($permission);
            }
        }

        Flash::success('Roles updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Roles from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        $this->rolesRepository->delete($id);

        Flash::success('Roles deleted successfully.');

        return redirect(route('roles.index'));
    }

    public function assignPermissions($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.assignpermissions')
            ->with('role', $role)->with('permissions', $permissions);
    }

    public function updatePermissions($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            if (isset(request()->permission[$permission->id])) {
                $role->givePermissionTo($permission);
            } else {
                $role->revokePermissionTo($permission);
            }
        }
        Flash::success('Roles updated successfully.');
        return redirect(route('roles.index'));
    }
}
