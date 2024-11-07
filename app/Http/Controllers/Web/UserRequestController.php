<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CreateUserReqRequest;
use App\Mail\ContactFormEmail;
use App\Models\UserRequest;
use App\Repositories\UserRequestRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Mail;

class UserRequestController extends Controller
{
    /** @var UserRequestRepository $userRequestRepository*/
    
    public function __construct(
        private UserRequestRepository $userRequestRepository
    ) {}

    
    public function store(CreateUserReqRequest $request)
    {
        $input = $request->validated();

        if($request->first_name || $request->last_name)
            $input['full_name'] = trim($request->first_name .' '. $request->last_name);

        $userRequest = $this->userRequestRepository->create($input);

        if($userRequest && $userRequest->type == UserRequest::CONST_TYPE_CONTACT_US){
            $userRequest = UserRequest::find($userRequest->id);

            if($deparment = $userRequest?->department)
                Mail::send(new ContactFormEmail($deparment->name, $deparment->email, $userRequest));
        }

        Flash::success('User request sent successfully.');
        return redirect()->back();
    }
}
