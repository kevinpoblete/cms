<?php

namespace App\Repositories\cms;

use App\Input;

class InputRepository{
    
    private $input;

    public function __construct(Input $input)
    {
        $this->input = $input;
    }
    

    public function findById($id){

        return $input = $this->input->where('id', $id)->firstOrFail();
    }

    public function all(){

        return $this->input->all();

         
    }
    

}