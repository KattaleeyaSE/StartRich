<?php

namespace App\IRepositories;

use Illuminate\Http\Request;
interface IUserRepository
{
    public function all();
    public function find($id);
    public function create(Request $request);
    public function update($id, Request $request);
    public function delete($id);
}