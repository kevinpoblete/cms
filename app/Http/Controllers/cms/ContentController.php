<?php

namespace App\Http\Controllers\cms;
use App\Http\Controllers\Controller;
use App\Repositories\cms\ContentRepository;
use App\Repositories\cms\SectionRepository;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;

class ContentController extends Controller
{
    
    private $contentRepository;
    private $sectionRepository;
    
    public function __construct(ContentRepository $contentRepository, SectionRepository $sectionRepository)
    {
        $this->contentRepository = $contentRepository;
        $this->sectionRepository = $sectionRepository;
        
    }

    public function store($page, $section, Request $request){
        
        
        $section = $this->sectionRepository->findByID($section);
        
        $this->contentRepository->store($request, $section);
        return redirect('/pages/' . $page);
    }

    public function update(Request $request){
        $this->contentRepository->update($request);
        return redirect()->back();

    }

    public function destroy($page, $section, $content){
        dd('tanga');
        $this->contentRepository->destroy($content);
        return redirect('/pages/' . $page);
    }
}
