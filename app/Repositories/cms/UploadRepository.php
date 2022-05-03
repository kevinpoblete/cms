<?php

namespace App\Repositories\cms;


use App\Upload;

class UploadRepository{

    private $upload;

    public function __construct(Upload $upload)
    {
        $this->upload = $upload;
    }

    public function findById($id){
        return $this->upload->where('id', $id)->firstOrFail();
    }

    public function store($section, $request){
        $this->validate($request);
        
        if($request->hasFile('img')){
            //Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $file_name = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $size = $request->file('img')->getSize();
            $type = $request->file('img')->getClientOriginalExtension();
            $file_name = $file_name.'_'.time().'.'.$type;
            $storage_url = $request->file('img')->storeAs('public/cms', $file_name);

            $section->uploads()->create([
                'label' => $request->label,
                'slug' => $request->slug,
                'size' => $size,
                'type' => $type,
                'file_name' => $file_name,
                'storage_url' => $storage_url,

            ]);
        }

    }
    public function validate($request){
        return $request->validate([
            'img' => 'required',
            'slug' => 'required',
            'label' => 'required',
        ]);
    }
}