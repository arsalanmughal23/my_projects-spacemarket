<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentMethodDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Repositories\PaymentMethodRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PaymentMethodController extends AppBaseController
{
    /** @var PaymentMethodRepository $paymentMethodRepository*/
    private $paymentMethodRepository;

    public function __construct(PaymentMethodRepository $paymentMethodRepo)
    {
        $this->middleware('auth');
        $this->paymentMethodRepository = $paymentMethodRepo;
    }

    /**
     * Display a listing of the PaymentMethod.
     *
     * @param PaymentMethodDataTable $paymentMethodDataTable
     *
     * @return Response
     */
    public function index(PaymentMethodDataTable $paymentMethodDataTable)
    {
        return $paymentMethodDataTable->render('payment_methods.index');
    }

    /**
     * Show the form for creating a new PaymentMethod.
     *
     * @return Response
     */
    public function create()
    {
        return view('payment_methods.create');
    }

    /**
     * Store a newly created PaymentMethod in storage.
     *
     * @param CreatePaymentMethodRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentMethodRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $uploadedFile = replaceUploadedFile($request->file('image'), 'payment_method');
            if($uploadedFile) $data['image'] = $uploadedFile;

            // $data['image'] = s3Upload($request->file('image'));
        }

        $paymentMethod = $this->paymentMethodRepository->create($data);

        Flash::success('Payment Method saved successfully.');

        return redirect(route('payment_methods.index'));
    }

    /**
     * Display the specified PaymentMethod.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paymentMethod = $this->paymentMethodRepository->find($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('payment_methods.index'));
        }

        return view('payment_methods.show')->with('paymentMethod', $paymentMethod);
    }

    /**
     * Show the form for editing the specified PaymentMethod.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paymentMethod = $this->paymentMethodRepository->find($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('payment_methods.index'));
        }

        return view('payment_methods.edit')->with('paymentMethod', $paymentMethod);
    }

    /**
     * Update the specified PaymentMethod in storage.
     *
     * @param int $id
     * @param UpdatePaymentMethodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentMethodRequest $request)
    {
        $paymentMethod = $this->paymentMethodRepository->find($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('payment_methods.index'));
        }

        $data = $request->validated();
        if ($request->hasFile('image')) {
            $uploadedFile = replaceUploadedFile($request->file('image'), 'payment_method', $paymentMethod?->image);
            if($uploadedFile) $data['image'] = $uploadedFile;

            // $data['image'] = s3Upload($request->file('image'));
        }

        $paymentMethod = $this->paymentMethodRepository->update($data, $id);

        Flash::success('Payment Method updated successfully.');

        return redirect(route('payment_methods.index'));
    }

    /**
     * Remove the specified PaymentMethod from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paymentMethod = $this->paymentMethodRepository->find($id);

        if (empty($paymentMethod)) {
            Flash::error('Payment Method not found');

            return redirect(route('payment_methods.index'));
        }

        $this->paymentMethodRepository->delete($id);

        Flash::success('Payment Method deleted successfully.');

        return redirect(route('payment_methods.index'));
    }
}
