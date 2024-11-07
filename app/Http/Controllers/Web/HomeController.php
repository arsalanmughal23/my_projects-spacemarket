<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Cms;
use App\Repositories\CmsRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private CmsRepository $cmsRepo
    ) {}

    public function index()
    {
        $pageSlug = 'home';
        $cmsQuery = $this->cmsRepo->model()::where('page_slug', $pageSlug);
        $sectionNames = ['section_1', 'section_2', 'section_3', 'section_4', 'section_5', 'section_6'];
        $data = [
            'page_slug' => $pageSlug,
            'page_name' => __('general.'.$pageSlug),
        ];

        foreach($sectionNames as $sectionName){
            $section = clone $cmsQuery;
            $data[$sectionName] = $section->where('section_slug', $sectionName)->pluck('value', 'key');
        }

        return view('web.'.$pageSlug, compact('data'));
    }
    
    public function blogs()
    {
        $pageSlug = 'blog_list_page';
        $cmsQuery = $this->cmsRepo->model()::where('page_slug', $pageSlug);
        $sectionNames = ['section_1'];
        $data = [
            'page_slug' => $pageSlug,
            'page_name' => __('general.'.$pageSlug)
        ];

        foreach($sectionNames as $sectionName){
            $section = clone $cmsQuery;
            $data[$sectionName] = $section->where('section_slug', $sectionName)->pluck('value', 'key');
        }

        return view('web.blog.list', compact('data'));
    }

    public function showBlog($id)
    {
        $data = Blog::find($id);
        if(!$data)
            abort(404);

        return view('web.blog.detail', compact('data'));
    }

    public function marketplace(Request $request, $pageSlug)
    {
        if(!in_array($pageSlug, Cms::CONST_MARKETPLACE_SLUGS))
            abort(404);

        $cmsQuery = $this->cmsRepo->model()::where('page_slug', 'marketplace_'.$pageSlug);
        $sectionNames = ['section_1', 'section_2', 'section_3'];
        $data = [
            'page_slug' => $pageSlug,
            'page_name' => __('general.marketplace.'.$pageSlug),
        ];

        foreach($sectionNames as $sectionName){
            $section = clone $cmsQuery;
            $data[$sectionName] = $section->where('section_slug', $sectionName)->pluck('value', 'key');
        }
        // return $data;
        return view('web.marketplace.'.$pageSlug, compact('data'));
    }

    public function trading(Request $request, $pageSlug)
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
        return view('web.trading.'.$pageSlug, compact('data'));
    }
    
    public function partner(Request $request, $pageSlug)
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
        return view('web.partner.'.$pageSlug, compact('data'));
    }
    
    public function support(Request $request, $pageSlug)
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
        return view('web.support.'.$pageSlug, compact('data'));
    }
}
