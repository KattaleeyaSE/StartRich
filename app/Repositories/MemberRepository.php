<?php

namespace App\Repositories;

use App\IRepositories\IMemberRepository;
use App\IRepositories\IUserRepository;
use App\Http\Requests\MemberStoreCrudRequest;
use App\Http\Requests\MemberUpdateCrudRequest;
use App\Models\Member;

use Illuminate\Http\Request;
class MemberRepository implements IMemberRepository
{
    private $member;
    private $userRepository;

    public function __construct(IUserRepository $userRepository,Member $member)
    {
        $this->member = $member;
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return $this->member->all();
    }

    public function find($id)
    {
        return $this->member->find($id);
    }

    public function create(MemberStoreCrudRequest $request)
    {
        return $this->member->create($request);
    }

    public function update($id, MemberUpdateCrudRequest $request)
    {
        return $this->member->update($id,$request);
    }

    public function delete($id)
    {
        $member = $this->find($id);
        if (is_null($member)) {
            return false;
        }
        return $this->userRepository->delete($member->user->id);
    }
}