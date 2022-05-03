<?php

namespace App\Http\Controllers\cms;
use App\Http\Controllers\Controller;
use App\Repositories\cms\PageRepository;
use App\Repositories\cms\SectionRepository;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $sectionRepository;
    private $pageRepository;

    public function __construct(SectionRepository $sectionRepository, PageRepository $pageRepository)
    {
        $this->sectionRepository = $sectionRepository;
        $this->pageRepository = $pageRepository;
        $this->middleware('auth');
        
    }

    public function show($page, $section){
        $page = $this->pageRepository->findByID($page);
        $section = $this->sectionRepository->findByID( $section);
        return view('admin.cms.sections.show', compact('section', 'page'));

    }

    public function create($page){
        $page = $this->pageRepository->findByID($page);
        return view('admin.cms.sections.create', compact('page'));
    }

    public function store(Request $request, $page){
        $page = $this->pageRepository->findByID($page);
        $section = $this->sectionRepository->store($request, $page);
        return redirect('/pages/' . $page->id );
    }

    public function edit($page, $section){
        
        $page = $this->pageRepository->findByID($page);
        $section = $this->sectionRepository->findByID($section);
        return view('admin.cms.sections.edit', compact('page', 'section'));
    }

    public function update(Request $request, $page, $section){
        $section = $this->sectionRepository->update($request, $section);
        return redirect('/pages/' . $page . '/sections/' .$section);
    }

    public function destroy($page, $section){
        $this->sectionRepository->destroy($section);
        return redirect('/pages/' . $page);
    }
}
