<?php

namespace App\Http\Controllers;

use App\DataTables\LearningVideoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLearningVideoRequest;
use App\Http\Requests\UpdateLearningVideoRequest;
use App\Repositories\LearningVideoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LearningVideoController extends AppBaseController
{
    /** @var LearningVideoRepository $learningVideoRepository*/
    private $learningVideoRepository;

    public function __construct(LearningVideoRepository $learningVideoRepo)
    {
        $this->middleware('auth');
        $this->learningVideoRepository = $learningVideoRepo;
    }

    /**
     * Display a listing of the LearningVideo.
     *
     * @param LearningVideoDataTable $learningVideoDataTable
     *
     * @return Response
     */
    public function index(LearningVideoDataTable $learningVideoDataTable)
    {
        return $learningVideoDataTable->render('learning_videos.index');
    }

    /**
     * Show the form for creating a new LearningVideo.
     *
     * @return Response
     */
    public function create()
    {
        return view('learning_videos.create');
    }

    /**
     * Store a newly created LearningVideo in storage.
     *
     * @param CreateLearningVideoRequest $request
     *
     * @return Response
     */
    public function store(CreateLearningVideoRequest $request)
    {
        $input = $request->all();

        $learningVideo = $this->learningVideoRepository->create($input);

        Flash::success('Learning Video saved successfully.');

        return redirect(route('learning_videos.index'));
    }

    /**
     * Display the specified LearningVideo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $learningVideo = $this->learningVideoRepository->find($id);

        if (empty($learningVideo)) {
            Flash::error('Learning Video not found');

            return redirect(route('learning_videos.index'));
        }

        return view('learning_videos.show')->with('learningVideo', $learningVideo);
    }

    /**
     * Show the form for editing the specified LearningVideo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $learningVideo = $this->learningVideoRepository->find($id);

        if (empty($learningVideo)) {
            Flash::error('Learning Video not found');

            return redirect(route('learning_videos.index'));
        }

        return view('learning_videos.edit')->with('learningVideo', $learningVideo);
    }

    /**
     * Update the specified LearningVideo in storage.
     *
     * @param int $id
     * @param UpdateLearningVideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLearningVideoRequest $request)
    {
        $learningVideo = $this->learningVideoRepository->find($id);

        if (empty($learningVideo)) {
            Flash::error('Learning Video not found');

            return redirect(route('learning_videos.index'));
        }

        $learningVideo = $this->learningVideoRepository->update($request->all(), $id);

        Flash::success('Learning Video updated successfully.');

        return redirect(route('learning_videos.index'));
    }

    /**
     * Remove the specified LearningVideo from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $learningVideo = $this->learningVideoRepository->find($id);

        if (empty($learningVideo)) {
            Flash::error('Learning Video not found');

            return redirect(route('learning_videos.index'));
        }

        $this->learningVideoRepository->delete($id);

        Flash::success('Learning Video deleted successfully.');

        return redirect(route('learning_videos.index'));
    }
}
