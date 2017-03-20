<?php

namespace App\Repositories;

use App\IRepositories\ISuitabilityTestRepository;

use App\Models\SuitabilityTest;
use App\Models\SuitabilityTestResult;
use Illuminate\Http\Request;
class SuitabilityTestRepository implements ISuitabilityTestRepository
{
    private $suitabilityTest;
    private $suitabilityTestResult;
    public function __construct(SuitabilityTest $suitabilityTest,SuitabilityTestResult $suitabilityTestResult)
    {
        $this->suitabilityTest = $suitabilityTest;
        $this->suitabilityTestResult = $suitabilityTestResult;
    }

    public function all()
    {
        return $this->suitabilityTest->all();;
    }

    public function all_by_amc_id_pagination($amc_id,$paging)
    {
        return $this->suitabilityTest->where('amc_id', $amc_id)->paginate($paging);
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
        return $suitabilityTest->delete();
    }

    public function find_result($id)
    {
        return $this->suitabilityTestResult->find($id);
    }

    public function create_result($id, Request $request)
    {
        $suitabilityTest = $this->find($id); 
        return $suitabilityTest->suitability_test_results()->save($request->all());          
    }

    public function update_result($id, Request $request)
    {
        $suitabilityTest = $this->find($id); 
        return $suitabilityTest->suitability_test_results()->update($request->all()); 
    }
    
    public function delete_result($id)
    {
        $suitabilityTestResult = $this->find_result($id);
        if (is_null($suitabilityTestResult)) {
            return false;
        }
        return $suitabilityTestResult->delete();
    }

}