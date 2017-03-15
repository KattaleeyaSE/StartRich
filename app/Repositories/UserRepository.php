<?php

namespace App\Repositories;

use App\IRepositories\IUserRepository;
use App\Http\Requests\UserStoreCrudRequest;
use App\Http\Requests\UserUpdateCrudRequest;
use App\User;

use Illuminate\Http\Request;
class UserRepository implements IUserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function create(UserStoreCrudRequest $request)
    {
        return $this->user->create($request);
    }

    public function update($id, UserUpdateCrudRequest $request)
    {
        return $this->user->update($id,$request);
    }

    public function delete($id)
    {
        $user = $this->find($id);
        if (is_null($user)) {
            return false;
        }
        $result = $user->delete();
        return $result;      
    }
}