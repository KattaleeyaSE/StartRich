<?php

namespace App\IRepositories;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreCrudRequest;
use App\Http\Requests\UserUpdateCrudRequest;
interface IUserRepository
{
    public function all();
    public function find($id);
    public function create(UserStoreCrudRequest $request);
    public function update($id, UserUpdateCrudRequest $request);
    
    /**
    * @param int id
    *
    * @return boolean
    **/    
    public function delete($id);
}