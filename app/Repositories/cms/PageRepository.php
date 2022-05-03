<?php

namespace App\Repositories\cms;

use App\Page;

class PageRepository{

    private $page;
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function all(){
        return $this->page->all();
    }

    public function findByID($id){
        return $this->page->where('id', $id)->firstOrFail();
    }

    public function store($request){
        
        $data = $this->validate($request);
        return $this->page->create($data);
    }

    public function update($id, $request){
        
        $page = $this->findByID($id);
        $data = $this->validate($request);
        return $page->update($data);
    }

    public function destroy($id){
        $page = $this->findByID($id);
        $page->delete();

    }

    public function validate($request){
        return $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
    }
}