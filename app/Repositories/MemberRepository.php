<?php

namespace App\Repositories;

use App\IRepositories\IMemberRepository;
use App\IRepositories\IUserRepository;


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

    public function create(Request $request)
    {
        $user = $this->userRepository->create($request);
        $request->offsetSet('user_id',$user->id);
                
        return $this->member->create($request->all());
    }

    public function update($id, Request $request)
    {
        $member = $this->find($id);
        $updatedUser = $this->userRepository->update($member->user->id,$request);       
        return $member->update($request->all());
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