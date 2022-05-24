<?php

namespace App\Repositories\cms;


use App\Content;
use App\Http\Requests\ContentRequest;

class ContentRepository{

    private $content;
    private $uploadRepository;
    public function __construct(Content $content, UploadRepository $uploadRepository)
    {
        $this->content = $content;
        $this->uploadRepository = $uploadRepository;
        
    }

    public function all(){
        return $this->content->orderBy('order', 'ASC')->get();
    }

    public function findByID($id){
        return $this->content->where('id', $id)->firstOrFail();
    }

    public function store($data, $section){
        
        return $section->contents()->create($data);
    }

    public function update($request){
        
        foreach($request->contents as $key => $value) {
            
            $content = $this->content->find($key);
            //$request->validated($content);
            
            
            $content->update(['content' => $value]);                               
        }
        if($request->img){
            foreach($request->img as $key => $value) {
                $upload = $this->uploadRepository->findByID($key);
                $filenameWithExt = $request->img[$key]->getClientOriginalName();
                $file_name = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $size = $request->img[$key]->getSize();
                $type = $request->img[$key]->getClientOriginalExtension();
                $file_name = $file_name.'_'.time().'.'.$type;
                $storage_url = $request->img[$key]->storeAs('public/cms', $file_name);
                $upload->update([
                    'size' => $size,
                    'type' => $type,
                    'file_name' => $file_name,
                    'storage_url' => $storage_url,
                ]);                               
            }
        }
        
        

    }

    public function destroy($id){
        $content = $this->findByID($id);
        
        $content->delete();

    }

    
}