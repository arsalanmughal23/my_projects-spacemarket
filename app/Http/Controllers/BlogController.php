<?php

namespace App\Http\Controllers;

use App\DataTables\BlogDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Repositories\BlogRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BlogController extends AppBaseController
{
    /** @var BlogRepository $blogRepository*/
    private $blogRepository;

    public function __construct(BlogRepository $blogRepo)
    {
        $this->middleware('auth');
        $this->blogRepository = $blogRepo;
    }

    /**
     * Display a listing of the Blog.
     *
     * @param BlogDataTable $blogDataTable
     *
     * @return Response
     */
    public function index(BlogDataTable $blogDataTable)
    {
        return $blogDataTable->render('blogs.index');
    }

    /**
     * Show the form for creating a new Blog.
     *
     * @return Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created Blog in storage.
     *
     * @param CreateBlogRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('banner_image')) {
            $uploadedFile = replaceUploadedFile($request->file('banner_image'), 'blog/banner');
            if($uploadedFile) $data['banner_image'] = $uploadedFile;

            // $data['banner_image'] = s3Upload($request->file('banner_image'));
        }
        if ($request->hasFile('image')) {
            $uploadedFile = replaceUploadedFile($request->file('image'), 'blog');
            if($uploadedFile) $data['image'] = $uploadedFile;

            // $data['image'] = s3Upload($request->file('image'));
        }

        $blog = $this->blogRepository->create($data);

        Flash::success('Blog saved successfully.');

        return redirect(route('blogs.index'));
    }

    /**
     * Display the specified Blog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('blogs.index'));
        }

        return view('blogs.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified Blog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('blogs.index'));
        }

        return view('blogs.edit')->with('blog', $blog);
    }

    /**
     * Update the specified Blog in storage.
     *
     * @param int $id
     * @param UpdateBlogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogRequest $request)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('blogs.index'));
        }

        $data = $request->validated();
        if ($request->hasFile('banner_image')) {
            $uploadedFile = replaceUploadedFile($request->file('banner_image'), 'blog/banner');
            if($uploadedFile) $data['banner_image'] = $uploadedFile;

            // $data['banner_image'] = s3Upload($request->file('banner_image'));
        }
        if ($request->hasFile('image')) {
            $uploadedFile = replaceUploadedFile($request->file('image'), 'blog');
            if($uploadedFile) $data['image'] = $uploadedFile;

            // $data['image'] = s3Upload($request->file('image'));
        }

        $blog = $this->blogRepository->update($data, $id);

        Flash::success('Blog updated successfully.');

        return redirect(route('blogs.index'));
    }

    /**
     * Remove the specified Blog from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('blogs.index'));
        }

        $this->blogRepository->delete($id);

        Flash::success('Blog deleted successfully.');

        return redirect(route('blogs.index'));
    }
}
