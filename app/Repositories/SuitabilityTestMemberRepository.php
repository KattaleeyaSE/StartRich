<?php

namespace App\Repositories;

use App\IRepositories\ISuitabilityTestMemberRepository;

use App\Models\SuitabilityTestMember;
use App\Models\SuitabilityTestMemberAnswer;
use Illuminate\Http\Request;
class SuitabilityTestMemberRepository implements ISuitabilityTestMemberRepository
{
    private $suitabilityTest;
    private $suitabilityTestMember;

    public function __construct(
            SuitabilityTestMember $suitabilityTestMember,
            SuitabilityTestMemberAnswer $suitabilityTestMemberAnswer
        )
    {
        $this->suitabilityTestMember = $suitabilityTestMember;
        $this->SuitabilityTestMemberAnswer = $suitabilityTestMemberAnswer;
    }

    public function all()
    {
        return $this->suitabilityTestMember->all();
    }

    public function all_pagination($paging)
    {
        return $this->suitabilityTestMember->paginate($paging);
    }

    public function all_by_member_id_pagination($member_id,$paging)
    {
        return $this->suitabilityTestMember->where('member_id', $member_id)->with( 'member' )->paginate($paging);
    }

    public function find($id)
    {
        return $this->suitabilityTestMember->find($id);
    }

    public function create(Request $request)
    {
        return $this->suitabilityTestMember->create($request->all());
    }

    public function update($id, Request $request)
    {
        $suitabilityTestMember = $this->find($id);  
        return $suitabilityTestMember->update($request->all());
    }

    public function delete($id)
    {
        $suitabilityTestMember = $this->find($id);
        if (is_null($suitabilityTestMember)) {
            return false;
        }
        return $suitabilityTestMember->delete();
    }

    public function find_answer($id)
    {
        return $this->SuitabilityTestMemberAnswer->find($id);
    }

    public function create_answer(Request $request)
    {
        return $this->SuitabilityTestMemberAnswer->create($request->all());
    }

    public function update_answer($id, Request $request)
    {
        $SuitabilityTestMemberAnswer = $this->find($id);  
        return $SuitabilityTestMemberAnswer->update($request->all());
    }

    public function delete_answer($id)
    {
        $SuitabilityTestMemberAnswer = $this->find($id);
        if (is_null($SuitabilityTestMemberAnswer)) {
            return false;
        }
        return $SuitabilityTestMemberAnswer->delete();
    }
}