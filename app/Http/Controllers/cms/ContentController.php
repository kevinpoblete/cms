<?php

namespace App\Http\Controllers\cms;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
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
        $this->middleware('auth');
        
    }

    public function store($page, $section, ContentRequest $request){
        
        $data = $request->validated();
        $section = $this->sectionRepository->findByID($section);
        
        $this->contentRepository->store($data, $section);
        return redirect()->route('admin.pages.show', [$page]);
    }

    public function update(Request $request, $page){
        $this->contentRepository->update($request);
        return redirect()->route('admin.pages.show', [$page]);

    }

    public function destroy($page, $section, $content){
        dd('tanga');
        $this->contentRepository->destroy($content);
        return redirect()->route('admin.pages.show', [$page]);
    }
}
