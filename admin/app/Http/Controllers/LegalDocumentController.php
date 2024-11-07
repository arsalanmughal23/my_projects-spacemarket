<?php

namespace App\Http\Controllers;

use App\DataTables\LegalDocumentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLegalDocumentRequest;
use App\Http\Requests\UpdateLegalDocumentRequest;
use App\Repositories\LegalDocumentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Error;
use Exception;
use Illuminate\Http\Request;
use Response;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\StreamedResponse;


class LegalDocumentController extends AppBaseController
{
    /** @var LegalDocumentRepository $legalDocumentRepository*/
    private $legalDocumentRepository;

    public function __construct(LegalDocumentRepository $legalDocumentRepo)
    {
        $this->middleware('auth')->except('download');
        $this->legalDocumentRepository = $legalDocumentRepo;
    }

    /**
     * Display a listing of the LegalDocument.
     *
     * @param LegalDocumentDataTable $legalDocumentDataTable
     *
     * @return Response
     */
    public function index(LegalDocumentDataTable $legalDocumentDataTable)
    {
        return $legalDocumentDataTable->render('legal_documents.index');
    }

    public function download(Request $request)
    {
        try {
            $url = $request->query('url');
            $fileName = $request->query('name', basename($url));

            // Validate the URL
            if (!filter_var($url, FILTER_VALIDATE_URL))
                throw new Error('Invalid URL');

            // Get the filename from the URL or set a default one

            // Create a Guzzle client
            $client = new Client();

            // Stream the file download
            $response = new StreamedResponse(function () use ($client, $url) {
                $stream = $client->get($url, ['stream' => true])->getBody()->detach();
                fpassthru($stream);
                fclose($stream);
            }, 200, [
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '.pdf"',
            ]);

            return $response;

        } catch (Error $error) {
            abort(403, $error->getMessage());
        } catch (Exception $exception) {
            abort(403, $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new LegalDocument.
     *
     * @return Response
     */
    public function create()
    {
        return view('legal_documents.create');
    }

    /**
     * Store a newly created LegalDocument in storage.
     *
     * @param CreateLegalDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateLegalDocumentRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('pdf_file')){
            $uploadedFile = replaceUploadedFile($request->file('pdf_file'), 'legal_document');
            if($uploadedFile) $data['link'] = $uploadedFile;

            // $data['link'] = s3Upload($request->file('pdf_file'));
        }

        $legalDocument = $this->legalDocumentRepository->create($data);

        Flash::success('Legal Document saved successfully.');

        return redirect(route('legal_documents.index'));
    }

    /**
     * Display the specified LegalDocument.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $legalDocument = $this->legalDocumentRepository->find($id);

        if (empty($legalDocument)) {
            Flash::error('Legal Document not found');

            return redirect(route('legal_documents.index'));
        }

        return view('legal_documents.show')->with('legalDocument', $legalDocument);
    }

    /**
     * Show the form for editing the specified LegalDocument.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $legalDocument = $this->legalDocumentRepository->find($id);

        if (empty($legalDocument)) {
            Flash::error('Legal Document not found');

            return redirect(route('legal_documents.index'));
        }

        return view('legal_documents.edit')->with('legalDocument', $legalDocument);
    }

    /**
     * Update the specified LegalDocument in storage.
     *
     * @param int $id
     * @param UpdateLegalDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLegalDocumentRequest $request)
    {
        $legalDocument = $this->legalDocumentRepository->find($id);

        if (empty($legalDocument)) {
            Flash::error('Legal Document not found');

            return redirect(route('legal_documents.index'));
        }

        $data = $request->validated();
        if ($request->hasFile('pdf_file')) {
            $uploadedFile = replaceUploadedFile($request->file('pdf_file'), 'legal_document', $legalDocument?->link);
            if($uploadedFile) $data['link'] = $uploadedFile;

            // $data['link'] = s3Upload($request->file('pdf_file'));
        }

        $legalDocument = $this->legalDocumentRepository->update($data, $id);

        Flash::success('Legal Document updated successfully.');

        return redirect(route('legal_documents.index'));
    }

    /**
     * Remove the specified LegalDocument from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $legalDocument = $this->legalDocumentRepository->find($id);

        if (empty($legalDocument)) {
            Flash::error('Legal Document not found');

            return redirect(route('legal_documents.index'));
        }

        $this->legalDocumentRepository->delete($id);

        Flash::success('Legal Document deleted successfully.');

        return redirect(route('legal_documents.index'));
    }
}
