<?php

namespace App\Repositories;

use App\IRepositories\IAMCRepository;
use App\IRepositories\IUserRepository;

use App\Models\AMC;

use Illuminate\Http\Request;
class AMCRepository implements IAMCRepository
{
    private $amc;
    private $userRepository;

    public function __construct(IUserRepository $userRepository,AMC $amc)
    {
        $this->userRepository = $userRepository;       
        $this->amc = $amc;
    }

    public function all()
    {
        return $this->amc->all();
    }

    public function find($id)
    {
        return $this->amc->find($id);
    }

    public function create(Request $request)
    {
        $user = $this->userRepository->create($request);
        $request->offsetSet('user_id',$user->id);
        
        return $this->amc->create($request->all());
    }

    public function update($id, Request $request)
    {

        $amc = $this->find($id);
        $updatedUser = $this->userRepository->update($amc->user->id,$request);

        return $amc->update($request->all());
    }

    public function delete($id)
    {
        $amc = $this->find($id);
        if (is_null($amc)) {
            return false;
        }
        return $this->userRepository->delete($amc->user->id);
    }
}