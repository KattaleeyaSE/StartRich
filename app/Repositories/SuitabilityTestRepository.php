<?php

namespace App\Repositories;

use App\IRepositories\ISuitabilityTestRepository;

use App\Models\SuitabilityTest;
use App\Models\SuitabilityTestResult;
use App\Models\SuitabilityQuestion;
use App\Models\SuitabilityQuestionAnswer;
use Illuminate\Http\Request;
class SuitabilityTestRepository implements ISuitabilityTestRepository
{
    private $suitabilityTest;
    private $suitabilityTestResult;
    private $suitabilityTestQuestion;
    private $suitabilityTestAnswer;
    public function __construct(
            SuitabilityTest $suitabilityTest,
            SuitabilityTestResult $suitabilityTestResult,
            SuitabilityQuestion $suitabilityTestQuestion,
            SuitabilityQuestionAnswer $suitabilityTestAnswer
        )
    {
        $this->suitabilityTest = $suitabilityTest;
        $this->suitabilityTestResult = $suitabilityTestResult;
        $this->suitabilityTestQuestion = $suitabilityTestQuestion;
        $this->suitabilityTestAnswer = $suitabilityTestAnswer;
    }

    public function all()
    {
        return $this->suitabilityTest->all();;
    }

    public function all_pagination($paging)
    {
        return $this->suitabilityTest->paginate($paging);
    }

    public function all_by_amc_id_pagination($amc_id,$paging)
    {
        return $this->suitabilityTest->where('amc_id', $amc_id)->with('amc')->paginate($paging);
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

    public function create_result(Request $request)
    {
        return $this->suitabilityTestResult->create($request->all());          
    }

    public function update_result($id,Request $request)
    {
        $suitabilityTestResult = $this->find_result($id);  
        return $suitabilityTestResult->update($request->all()); 
    }
    
    public function delete_result($id)
    {
        $suitabilityTestResult = $this->find_result($id);
        if (is_null($suitabilityTestResult)) {
            return false;
        }
        return $suitabilityTestResult->delete();
    }
 
    public function find_question($id)
    {
        return $this->suitabilityTestQuestion->find($id);
    }  

    public function create_question(Request $request)
    {
        return $this->suitabilityTestQuestion->create($request->all());        
    }  

    public function update_question($id,Request $request)
    {
        $suitabilityTestQuestion = $this->find_question($id);  
        return $suitabilityTestQuestion->update($request->all()); 
    }  

    public function delete_question($id)
    {
        $suitabilityTestQuestion = $this->find_question($id);  
        if (is_null($suitabilityTestQuestion)) {
            return false;
        }
        return $suitabilityTestQuestion->delete();
    }  

    public function find_answer($id)
    {
        return $this->suitabilityTestAnswer->find($id);
    }  

    public function create_answer(Request $request)
    {
        return $this->suitabilityTestAnswer->create($request->all());        
    }  
    
    public function update_answer($id,Request $request)
    {
        $suitabilityTestAnswer = $this->find_answer($id);  
        return $suitabilityTestAnswer->update($request->all()); 
    }
 
    public function delete_answer($id)
    {
        $suitabilityTestAnswer = $this->find_answer($id);  
        if (is_null($suitabilityTestAnswer)) {
            return false;
        }
        return $suitabilityTestAnswer->delete();
    }
}