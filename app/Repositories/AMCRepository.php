<?php

namespace App\Repositories;

use App\IRepositories\IAMCRepository;
use App\IRepositories\IUserRepository;
use App\Http\Requests\AMCStoreCrudRequest;
use App\Http\Requests\AMCUpdateCrudRequest;
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

    public function create(AMCStoreCrudRequest $request)
    {
        return $this->amc->create($request);
    }

    public function update($id, AMCUpdateCrudRequest $request)
    {
        return $this->amc->update($id,$request);
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