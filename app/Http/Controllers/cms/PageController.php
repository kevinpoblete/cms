<?php

namespace App\Http\Controllers\cms;
use App\Http\Controllers\Controller;
use App\Repositories\cms\InputRepository;
use App\Repositories\cms\PageRepository;
use App\Repositories\cms\SectionRepository;
use Illuminate\Http\Request;


class PageController extends Controller
{
    private $pageRepository;
    private $sectionRepository;
    private $inputRepository;
    public function __construct(PageRepository $pageRepository, SectionRepository $sectionRepository, InputRepository $inputRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->sectionRepository = $sectionRepository;    
        $this->inputRepository = $inputRepository;
        $this->middleware('auth');    
    }
    public function index(){
        $pages = $this->pageRepository->all();
        return view('admin.cms.pages.index', compact('pages'));
    }

    public function show($page){
        $page = $this->pageRepository->findByID($page);
        $inputs = $this->inputRepository->all();
        
        return view('admin.cms.pages.show', compact('page', 'inputs'));
    }

    public function create(){
        return view('admin.cms.pages.create');
    }

    public function store(Request $request){
        $page = $this->pageRepository->store($request);
        
        return redirect()->route('admin.pages.show', $page->id);
    }

    public function edit($page){
        $page = $this->pageRepository->findByID($page);
        return view('admin.cms.pages.edit', compact('page'));
    }

    public function update($page, Request $request){
         $this->pageRepository->update($page, $request);
        return redirect(route('admin.pages.') . $page);
    }

    public function destroy($page){
        
        $this->pageRepository->destroy($page);
        return redirect()->route('admin.pages.index');
    }

    
}
