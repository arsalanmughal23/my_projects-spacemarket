<?php

namespace App\Http\Controllers;

use App\DataTables\DepartmentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Repositories\DepartmentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DepartmentController extends AppBaseController
{
    /** @var DepartmentRepository $departmentRepository*/
    
    public function __construct(
        private DepartmentRepository $departmentRepository
    ) { $this->middleware('auth'); }

    /**
     * Display a listing of the Department.
     *
     * @param DepartmentDataTable $departmentDataTable
     *
     * @return Response
     */
    public function index(DepartmentDataTable $departmentDataTable)
    {
        $totalDepartmentsCount = $this->departmentRepository->model()::count();
        $data = [ 'total_departments_count' => $totalDepartmentsCount ];
        return $departmentDataTable->render('departments.index', compact('data'));
    }

    /**
     * Show the form for creating a new Department.
     *
     * @return Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created Department in storage.
     *
     * @param CreateDepartmentRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        $input = $request->all();
        $departmentLimit = config('constants.department_count');

        if (!isDepartmentCreatable()) {            
            Flash::error('You should add maximum '.$departmentLimit.' Departments');
            return redirect(route('departments.index'));
        }

        $department = $this->departmentRepository->create($input);

        Flash::success('Department saved successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Display the specified Department.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        return view('departments.show')->with('department', $department);
    }

    /**
     * Show the form for editing the specified Department.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        return view('departments.edit')->with('department', $department);
    }

    /**
     * Update the specified Department in storage.
     *
     * @param int $id
     * @param UpdateDepartmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartmentRequest $request)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $department = $this->departmentRepository->update($request->all(), $id);

        Flash::success('Department updated successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified Department from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $this->departmentRepository->delete($id);

        Flash::success('Department deleted successfully.');

        return redirect(route('departments.index'));
    }
}
