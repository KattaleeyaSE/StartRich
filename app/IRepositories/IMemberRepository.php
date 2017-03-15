<?php

namespace App\IRepositories;

use Illuminate\Http\Request;
use App\Http\Requests\MemberStoreCrudRequest;
use App\Http\Requests\MemberUpdateCrudRequest;
interface IMemberRepository
{
    public function all();
    public function find($id);
    public function create(MemberStoreCrudRequest $request);
    public function update($id, MemberUpdateCrudRequest $request);

    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete($id);
}