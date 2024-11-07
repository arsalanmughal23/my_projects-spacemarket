<?php

namespace App\Http\Controllers;

use App\DataTables\CmDataTable;
use App\DataTables\CmsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCmsRequest;
use App\Http\Requests\UpdateCmsRequest;
use App\Repositories\CmsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class CmsController extends AppBaseController
{
    /** @var CmsRepository $cmsRepository*/
    private $cmsRepository;

    public function __construct(CmsRepository $cmsRepo)
    {
        $this->cmsRepository = $cmsRepo;
    }

    public function getPageWithSections(Request $request)
    {
        $response = [
            'status' => true,
            'message' => 'Page list',
            'data' => [
                [
                    'page_slug' => 'home',
                    'sections' => [
                        [
                            'section_slug' => 'home_section_one',
                            'keys' => [ 'home_section_one_title', 'home_section_one_description' ],
                        ],
                        [
                            'section_slug' => 'home_section_two',
                            'keys' => [ 'home_section_two_title', 'home_section_two_description' ],
                        ],
                        [
                            'section_slug' => 'home_section_three',
                            'keys' => [ 'home_section_three_title', 'home_section_three_description' ],
                        ]
                    ]
                ],
                [
                    'page_slug' => 'forex',
                    'sections' => [
                        [
                            'section_slug' => 'forex_section_one',
                            'keys' => [ 'forex_section_one_title', 'forex_section_one_description' ],
                        ],
                        
                        [
                            'section_slug' => 'forex_section_two',
                            'keys' => [ 'forex_section_two_title', 'forex_section_two_description' ],
                        ],
                        
                        [
                            'section_slug' => 'forex_section_three',
                            'keys' => [ 'forex_section_three_title', 'forex_section_three_description' ],
                        ],
                    ]
                ],
            ]
        ];
        return response()->json($response, 200);
    }

    /**
     * Display a listing of the Cms.
     *
     * @param CmDataTable $cmDataTable
     *
     * @return Response
     */
    public function index(CmsDataTable $cmDataTable)
    {
        return $cmDataTable->render('cms.index');
    }

    /**
     * Show the form for creating a new Cms.
     *
     * @return Response
     */
    public function create()
    {
        $pageSlugs = ['home'];
        $sectionSlugs = ['section_one'];
        return view('cms.create', compact('pageSlugs', 'sectionSlugs'));
    }

    /**
     * Store a newly created Cms in storage.
     *
     * @param CreateCmsRequest $request
     *
     * @return Response
     */
    public function store(CreateCmsRequest $request)
    {
        $input = $request->all();

        $cms = $this->cmsRepository->create($input);

        Flash::success('Cms saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified Cms.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect()->back();
        }

        return view('cms.show')->with('cms', $cms);
    }

    /**
     * Show the form for editing the specified Cms.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect()->back();
        }

        return view('cms.edit')->with('cms', $cms);
    }

    /**
     * Update the specified Cms in storage.
     *
     * @param int $id
     * @param UpdateCmsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCmsRequest $request)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect()->back();
        }

        $cms = $this->cmsRepository->update($request->all(), $id);

        Flash::success('Cms updated successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified Cms from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect()->back();
        }

        $this->cmsRepository->delete($id);

        Flash::success('Cms deleted successfully.');

        return redirect()->back();
    }
}
