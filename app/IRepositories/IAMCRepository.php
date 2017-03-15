<?php

namespace App\IRepositories;

use Illuminate\Http\Request;

interface IAMCRepository
{
    public function all();
    public function find($id);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return AMC Object
    **/ 
    public function create(Request $request);

    public function update($id, Request $request);
    
    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete($id);
}