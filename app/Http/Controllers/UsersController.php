<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use Flash;
use App\Repositories\RolesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Roles;
use Spatie\Permission\Models\Role as Role;
use App\Models\User as User;
use Illuminate\Support\Facades\Hash;
use Response;

class UsersController extends AppBaseController
{
    /** @var UsersRepository $usersRepository*/
    private $usersRepository;
    private $rolesRepository;

    public function __construct(UsersRepository $usersRepo, RolesRepository $rolesRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->rolesRepository = $rolesRepo;

    }

    /**
     * Display a listing of the Users.
     *
     * @param UsersDataTable $usersDataTable
     *
     * @return Response
     */
    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        $roles = $this->rolesRepository->all();
        return view('users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {
        $input = $request->all();

        $users = $this->usersRepository->create($input);

        $roles = $this->rolesRepository->all();

        foreach($roles as $role) {
            if (isset(request()->role[$role->id])) {
                $users->assignRole($role->id);
            }
            else {
                $users->removeRole($role->id);
            }
        }

        Flash::success('Users saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = $this->usersRepository->find($id);
        $roles = $this->rolesRepository->model()::where('name', '!=', Roles::ROLE_SUPER_ADMIN)->get();

        if (empty($users)) {
            Flash::error('Users not found');
            return redirect(route('users.index'));
        }

        return view('users.edit')->with(['users' => $users,'roles' => $roles, ]);
    }

    public function editProfile()
    {
        $user = auth()->user();
        $roles = [];

        if (!$user) {
            Flash::error('Users not found');
            return redirect()->back();
        }

        return view('profile.edit')->with(['users' => $user,'roles' => $roles, ]);
    }

    public function updateProfile(UpdateUsersRequest $request)
    {
        $user = auth()->user();

        if (!$user) {
            Flash::error('Users not found');
            return redirect(route('users.index'));
        }

        $data = $request->all();
        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

        $user = $this->usersRepository->update($data, $user->id);

        Flash::success('Users updated successfully.');
        return redirect()->back();
    }

    /**
     * Update the specified Users in storage.
     *
     * @param int $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $users = $this->usersRepository->update($request->all(), $id);

        $roles = $this->rolesRepository->all();

        foreach($roles as $role) {
            if (isset(request()->role[$role->id])) {
                $users->assignRole($role->id);
            }
            else {
                $users->removeRole($role->id);
            }
        }

        Flash::success('Users updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Users deleted successfully.');

        return redirect(route('users.index'));
    }

    public function assignRoles($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.assignroles')
            ->with('user', $user)->with('roles',$roles);
    }

    public function updateRoles($id)
    {
        $user = User::findOrFail($id);;
        $roles = Role::all();
        foreach($roles as $role) {
            if (isset(request()->role[$role->id])) {
                $user->assignRole($role);
            }
            else {
                $user->removeRole($role);
            }
        }
        Flash::success('Roles updated successfully.');
        return redirect(route('users.index'));
    }
}
