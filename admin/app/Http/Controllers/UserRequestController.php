<?php

namespace App\Http\Controllers;

use App\DataTables\UserRequestDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequestRequest;
use App\Http\Requests\UpdateUserRequestRequest;
use App\Repositories\UserRequestRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class UserRequestController extends AppBaseController
{
    /** @var UserRequestRepository $userRequestRepository*/
    
    public function __construct(
        private UserRequestRepository $userRequestRepository
    ) { $this->middleware('auth'); }

    /**
     * Display a listing of the UserRequest.
     *
     * @param UserRequestDataTable $userRequestDataTable
     *
     * @return Response
     */
    public function index(UserRequestDataTable $userRequestDataTable, Request $request)
    {
        $userRequestDataTable->type = $request->get('type', null);
        return $userRequestDataTable->render('user_requests.index');
    }

    /**
     * Show the form for creating a new UserRequest.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_requests.create');
    }

    /**
     * Store a newly created UserRequest in storage.
     *
     * @param CreateUserRequestRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequestRequest $request)
    {
        $input = $request->all();

        $userRequest = $this->userRequestRepository->create($input);

        Flash::success('User Request saved successfully.');

        return redirect(route('user_requests.index'). '?type='. $userRequest->type);
    }

    /**
     * Display the specified UserRequest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userRequest = $this->userRequestRepository->find($id);

        if (empty($userRequest)) {
            Flash::error('User Request not found');

            return redirect()->back();
        }

        return view('user_requests.show')->with('userRequest', $userRequest);
    }

    /**
     * Show the form for editing the specified UserRequest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userRequest = $this->userRequestRepository->find($id);

        if (empty($userRequest)) {
            Flash::error('User Request not found');

            return redirect()->back();
        }

        return view('user_requests.edit')->with('userRequest', $userRequest);
    }

    /**
     * Update the specified UserRequest in storage.
     *
     * @param int $id
     * @param UpdateUserRequestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequestRequest $request)
    {
        $userRequest = $this->userRequestRepository->find($id);

        if (empty($userRequest)) {
            Flash::error('User Request not found');

            return redirect()->back();
        }

        $userRequest = $this->userRequestRepository->update($request->all(), $id);

        Flash::success('User Request updated successfully.');

        return redirect(route('user_requests.index'). '?type='. $userRequest->type);
    }

    /**
     * Remove the specified UserRequest from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userRequest = $this->userRequestRepository->find($id);

        if (empty($userRequest)) {
            Flash::error('User Request not found');

            return redirect()->back();
        }

        $this->userRequestRepository->delete($id);

        Flash::success('User Request deleted successfully.');

        return redirect(route('user_requests.index'). '?type='. $userRequest->type);
    }
}
