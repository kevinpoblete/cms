<?php

namespace App\Repositories\cms;


use App\Section;

class SectionRepository{

    private $section;
    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function all(){
        return $this->section->orderBy('order', 'ASC')->get();
    }

    public function findByID($id){
        return $this->section->where('id', $id)->firstOrFail();
    }

    public function store($request, $page){
        $data = $this->validate($request);
        $section = $page->sections()->create($data);
        return $section;
    }

    public function update($request, $section){
        $data = $this->validate($request);
        $section = $this->findByID($section);
        return $section->update($data);

    }

    public function destroy($section){
        $section = $this->findByID($section);
        $section->delete();

    }

    public function validate($request){
        return $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'order' => 'required|integer',
        ]);
    }
}