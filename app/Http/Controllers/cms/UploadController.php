<?php

namespace App\Http\Controllers\cms;
use App\Http\Controllers\Controller;
use App\Repositories\cms\SectionRepository;
use App\Repositories\cms\UploadRepository;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    private $uploadRepository;
    private $sectionRepository;
    public function __construct(UploadRepository  $uploadRepository, SectionRepository $sectionRepository )
    {
        $this->uploadRepository = $uploadRepository;
        $this->sectionRepository = $sectionRepository;
    }

    public function store($page, $section, Request $request){

        $section = $this->sectionRepository->findByID($section);
        $this->uploadRepository->store($section, $request);
        return redirect()->back();
    }
}
