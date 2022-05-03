<?php

namespace App\Http\Controllers\cms;
use App\Http\Controllers\Controller;
use App\Repositories\cms\InputRepository;
use Illuminate\Http\Request;

class InputController extends Controller
{
    private $inputRepository;

    public function __construct(InputRepository $inputRepository)
    {
        $this->inputRepository = $inputRepository;
    }

    public function index(){
        
        $inputs = $this->inputRepository->all();
        
        return view('admin.cms.input.index', compact('inputs'));
    }
}
