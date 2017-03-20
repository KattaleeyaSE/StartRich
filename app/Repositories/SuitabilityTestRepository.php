<?php

namespace App\Repositories;

use App\IRepositories\ISuitabilityTestRepository;

use App\Models\SuitabilityTest;
use Illuminate\Http\Request;
class SuitabilityTestRepository implements ISuitabilityTestRepository
{
    private $suitabilityTest;
    public function __construct(SuitabilityTest $suitabilityTest)
    {
        $this->suitabilityTest = $suitabilityTest;
    }

    public function all()
    {
        return $this->suitabilityTest->all();
    }

    public function find($id)
    {
        return $this->suitabilityTest->find($id);
    }

    public function create(Request $request)
    {  
        return $this->suitabilityTest->create($request->all());
    }

    public function update($id, Request $request)
    {
        $suitabilityTest = $this->find($id);  
        return $suitabilityTest->update($request->all());
    }

    public function delete($id)
    {
        $suitabilityTest = $this->find($id);
        if (is_null($suitabilityTest)) {
            return false;
        }
        return $suitabilityTest->delete($member->user->id);
    }
}