<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Repositories\CmsRepository;
use Illuminate\Http\Request;
use Flash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private CmsRepository $cmsRepo
    ) { $this->middleware('auth'); }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function layoutPartEdit(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_LAYOUT_PART_SLUGS))
            abort(404);

        $cmsQuery = $this->cmsRepo->model()::where('page_slug', 'layout_part_'.$pageSlug);
        $sectionNames = ['section_1', 'section_2', 'section_3'];
        $data = [
            'page_slug' => $pageSlug,
            'page_name' => __('general.layout_part.'.$pageSlug),
        ];

        foreach($sectionNames as $sectionName){
            $section = clone $cmsQuery;
            $data[$sectionName] = $section->where('section_slug', $sectionName)->pluck('value', 'key');
        }
        // return $data;
        return view('layout_part.'.$pageSlug, compact('data'));
    }
    public function layoutPartUpdate(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_LAYOUT_PART_SLUGS))
            abort(404);

        $data = $request->except('_token', 'page_slug', 'section_slug', 'files');
        $cmsContent = [];
        foreach($data as $propertyKey => $propertyValue){
            $eachItem = [
                'page_slug' => 'layout_part_'.$pageSlug, //$request->page_slug,
                'section_slug' => $request->section_slug,
                'key' => $propertyKey,
                'value' => $propertyValue,
            ];

            $createdCmsContent = $this->cmsRepo->model()::updateOrCreate([
                'page_slug' => $eachItem['page_slug'],
                'section_slug' => $eachItem['section_slug'],
                'key' => $eachItem['key'],
            ], $eachItem);

            array_push($cmsContent, $createdCmsContent);
        }
        // return $cmsContent;
        
        Flash::success('Content Saved Successfully.');
        return redirect()->back();
    }

    public function homeEdit()
    {
        $cmsQuery = $this->cmsRepo->model()::where('page_slug', 'home');
        $sectionNames = ['section_1', 'section_2', 'section_3', 'section_4', 'section_5', 'section_6'];
        $data = null;

        foreach($sectionNames as $sectionName){
            $section = clone $cmsQuery;
            $data[$sectionName] = $section->where('section_slug', $sectionName)->pluck('value', 'key');
        }

        return view('home', compact('data'));
    }
    public function homeUpdate(Request $request)
    {
        $data = $request->except('_token', 'page_slug', 'section_slug', 'files');
        $cmsContent = [];
        foreach($data as $propertyKey => $propertyValue){
            $eachItem = [
                'page_slug' => 'home', //$request->page_slug,
                'section_slug' => $request->section_slug,
                'key' => $propertyKey,
                'value' => $propertyValue,
            ];

            $createdCmsContent = $this->cmsRepo->model()::updateOrCreate([
                'page_slug' => $eachItem['page_slug'],
                'section_slug' => $eachItem['section_slug'],
                'key' => $eachItem['key'],
            ], $eachItem);

            array_push($cmsContent, $createdCmsContent);
        }
        // return $cmsContent;
        
        Flash::success('Content Saved Successfully.');
        return redirect()->back();
    }

    public function marketplaceEdit(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_MARKETPLACE_SLUGS))
            abort(404);

        $cmsQuery = $this->cmsRepo->model()::where('page_slug', 'marketplace_'.$pageSlug);
        $sectionNames = ['section_1', 'section_2', 'section_3', 'section_4', 'section_5', 'section_6'];
        $data = [
            'page_slug' => $pageSlug,
            'page_name' => __('general.marketplace.'.$pageSlug),
        ];

        foreach($sectionNames as $sectionName){
            $section = clone $cmsQuery;
            $data[$sectionName] = $section->where('section_slug', $sectionName)->pluck('value', 'key');
        }
        // return $data;
        return view('marketplace.'.$pageSlug, compact('data'));
    }
    public function marketplaceUpdate(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_MARKETPLACE_SLUGS))
            abort(404);

        $data = $request->except('_token', 'page_slug', 'section_slug', 'files');
        $cmsContent = [];
        foreach($data as $propertyKey => $propertyValue){
            $eachItem = [
                'page_slug' => 'marketplace_'.$pageSlug, //$request->page_slug,
                'section_slug' => $request->section_slug,
                'key' => $propertyKey,
                'value' => $propertyValue,
            ];

            $createdCmsContent = $this->cmsRepo->model()::updateOrCreate([
                'page_slug' => $eachItem['page_slug'],
                'section_slug' => $eachItem['section_slug'],
                'key' => $eachItem['key'],
            ], $eachItem);

            array_push($cmsContent, $createdCmsContent);
        }
        // return $cmsContent;
        
        Flash::success('Content Saved Successfully.');
        return redirect()->back();
    }

    public function tradingEdit(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_TRADING_SLUGS))
            abort(404);

        $cmsQuery = $this->cmsRepo->model()::where('page_slug', 'trading_'.$pageSlug);
        $sectionNames = ['section_1', 'section_2', 'section_3'];
        $data = [
            'page_slug' => $pageSlug,
            'page_name' => __('general.trading.'.$pageSlug),
        ];

        foreach($sectionNames as $sectionName){
            $section = clone $cmsQuery;
            $data[$sectionName] = $section->where('section_slug', $sectionName)->pluck('value', 'key');
        }
        // return $data;
        return view('trading.'.$pageSlug, compact('data'));
    }
    public function tradingUpdate(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_TRADING_SLUGS))
            abort(404);

        $data = $request->except('_token', 'page_slug', 'section_slug', 'files');
        $cmsContent = [];

        $videoFile = null;
        if ($request->hasFile('video')) {
            $videoFile = s3Upload($request->file('video'));
        }

        foreach($data as $propertyKey => $propertyValue){

            $eachItem = [
                'page_slug' => 'trading_'.$pageSlug, //$request->page_slug,
                'section_slug' => $request->section_slug,
                'key' => $propertyKey
            ];

            if ($propertyKey == 'video') {
                if ($request->hasFile('video')){
                    $eachItem['value'] = $videoFile;
                }
            } else {
                $eachItem['value'] = $propertyValue;
            }

            $createdCmsContent = $this->cmsRepo->model()::updateOrCreate([
                'page_slug' => $eachItem['page_slug'],
                'section_slug' => $eachItem['section_slug'],
                'key' => $eachItem['key'],
            ], $eachItem);

            array_push($cmsContent, $createdCmsContent);
        }
        // return $cmsContent;
        
        Flash::success('Content Saved Successfully.');
        return redirect()->back();
    }

    public function partnerEdit(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_PARTNER_SLUGS))
            abort(404);

        $cmsQuery = $this->cmsRepo->model()::where('page_slug', 'partner_'.$pageSlug);
        $sectionNames = ['section_1', 'section_2', 'section_3'];
        $data = [
            'page_slug' => $pageSlug,
            'page_name' => __('general.partner.'.$pageSlug),
        ];

        foreach($sectionNames as $sectionName){
            $section = clone $cmsQuery;
            $data[$sectionName] = $section->where('section_slug', $sectionName)->pluck('value', 'key');
        }
        // return $data;
        return view('partner.'.$pageSlug, compact('data'));
    }
    public function partnerUpdate(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_PARTNER_SLUGS))
            abort(404);

        $data = $request->except('_token', 'page_slug', 'section_slug', 'files');
        $cmsContent = [];
        foreach($data as $propertyKey => $propertyValue){
            $eachItem = [
                'page_slug' => 'partner_'.$pageSlug, //$request->page_slug,
                'section_slug' => $request->section_slug,
                'key' => $propertyKey,
                'value' => $propertyValue,
            ];

            $createdCmsContent = $this->cmsRepo->model()::updateOrCreate([
                'page_slug' => $eachItem['page_slug'],
                'section_slug' => $eachItem['section_slug'],
                'key' => $eachItem['key'],
            ], $eachItem);

            array_push($cmsContent, $createdCmsContent);
        }
        // return $cmsContent;
        
        Flash::success('Content Saved Successfully.');
        return redirect()->back();
    }
    
    public function supportEdit(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_SUPPORT_SLUGS))
            abort(404);

        $cmsQuery = $this->cmsRepo->model()::where('page_slug', 'support_'.$pageSlug);
        $sectionNames = ['section_1', 'section_2', 'section_3', 'section_4', 'section_5'];
        $data = [
            'page_slug' => $pageSlug,
            'page_name' => __('general.support.'.$pageSlug),
        ];

        foreach($sectionNames as $sectionName){
            $section = clone $cmsQuery;
            $data[$sectionName] = $section->where('section_slug', $sectionName)->pluck('value', 'key');
        }
        // return $data;
        return view('support.'.$pageSlug, compact('data'));
    }
    public function supportUpdate(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_SUPPORT_SLUGS))
            abort(404);

        $data = $request->except('_token', 'page_slug', 'section_slug', 'files');
        $cmsContent = [];
        foreach($data as $propertyKey => $propertyValue){
            $eachItem = [
                'page_slug' => 'support_'.$pageSlug, //$request->page_slug,
                'section_slug' => $request->section_slug,
                'key' => $propertyKey,
                'value' => $propertyValue,
            ];

            $createdCmsContent = $this->cmsRepo->model()::updateOrCreate([
                'page_slug' => $eachItem['page_slug'],
                'section_slug' => $eachItem['section_slug'],
                'key' => $eachItem['key'],
            ], $eachItem);

            array_push($cmsContent, $createdCmsContent);
        }
        // return $cmsContent;
        
        Flash::success('Content Saved Successfully.');
        return redirect()->back();
    }

    public function blogListPageEdit()
    {
        $cmsQuery = $this->cmsRepo->model()::where('page_slug', 'blog_list_page');
        $sectionNames = ['section_1'];
        $data = null;

        foreach($sectionNames as $sectionName){
            $section = clone $cmsQuery;
            $data[$sectionName] = $section->where('section_slug', $sectionName)->pluck('value', 'key');
        }

        return view('blog_list_page', compact('data'));
    }
    public function blogListPageUpdate(Request $request)
    {
        $data = $request->except('_token', 'page_slug', 'section_slug', 'files');
        $cmsContent = [];
        foreach($data as $propertyKey => $propertyValue){
            $eachItem = [
                'page_slug' => 'blog_list_page', //$request->page_slug,
                'section_slug' => $request->section_slug,
                'key' => $propertyKey,
                'value' => $propertyValue,
            ];

            $createdCmsContent = $this->cmsRepo->model()::updateOrCreate([
                'page_slug' => $eachItem['page_slug'],
                'section_slug' => $eachItem['section_slug'],
                'key' => $eachItem['key'],
            ], $eachItem);

            array_push($cmsContent, $createdCmsContent);
        }
        // return $cmsContent;
        
        Flash::success('Content Saved Successfully.');
        return redirect()->back();
    }
}
