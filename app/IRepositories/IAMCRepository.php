<?php

namespace App\IRepositories;

use Illuminate\Http\Request;
use App\Http\Requests\AMCStoreCrudRequest;
use App\Http\Requests\AMCUpdateCrudRequest;
interface IAMCRepository
{
    public function all();
    public function find($id);
    public function create(AMCStoreCrudRequest $request);
    public function update($id, AMCUpdateCrudRequest $request);
    
    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete($id);
}