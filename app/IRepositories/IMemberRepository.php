<?php

namespace App\IRepositories;

use Illuminate\Http\Request;


interface IMemberRepository
{
    public function all();
    public function find($id);
    public function create(Request $request);
    public function update($id, Request $request);

    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete($id);
}