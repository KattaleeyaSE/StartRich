<?php

namespace App\IRepositories;

use Illuminate\Http\Request;


interface IUserRepository
{
    public function all();
    public function find($id);
    public function create(Request $request);

    /**
     * @param Illuminate\Http\Request $request
     * @param int id
     *
     * @return User Object
    **/     
    public function update($id, Request $request);
    
    /**
    * @param int id
    *
    * @return boolean
    **/    
    public function delete($id);
}