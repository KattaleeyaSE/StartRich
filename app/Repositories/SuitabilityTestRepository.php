<?php

namespace App\Repositories;

use App\IRepositories\ISuitabilityTestRepository;

use App\Models\SuitabilityTest;
use App\Models\SuitabilityTestFund;
use App\Models\SuitabilityTestResult;
use App\Models\SuitabilityQuestion;
use App\Models\SuitabilityQuestionAnswer;
use App\Models\SuitabilityAsset;
use App\Models\SuitabilityAssetTest;
use Illuminate\Http\Request;
class SuitabilityTestRepository implements ISuitabilityTestRepository
{
    private $suitabilityTest;
    private $suitabilityTestFund;
    private $suitabilityTestResult;
    private $suitabilityTestQuestion;
    private $suitabilityTestAnswer;
    private $suitabilityAsset;
    private $suitabilityAssetTest;
    public function __construct(
            SuitabilityTest $suitabilityTest,
            SuitabilityTestFund $suitabilityTestFund,
            SuitabilityTestResult $suitabilityTestResult,
            SuitabilityQuestion $suitabilityTestQuestion,
            SuitabilityQuestionAnswer $suitabilityTestAnswer,
            SuitabilityAsset $suitabilityAsset,
            SuitabilityAssetTest $suitabilityAssetTest
        )
    {
        $this->suitabilityTest = $suitabilityTest;
        $this->suitabilityTestFund = $suitabilityTestFund;
        $this->suitabilityTestResult = $suitabilityTestResult;
        $this->suitabilityTestQuestion = $suitabilityTestQuestion;
        $this->suitabilityTestAnswer = $suitabilityTestAnswer;
        $this->suitabilityAsset = $suitabilityAsset;
        $this->suitabilityAssetTest = $suitabilityAssetTest;
    }

    public function all()
    {
        return $this->suitabilityTest->all();;
    }

    public function all_pagination($paging)
    {
        return $this->suitabilityTest->orderBy('updated_at','DESC')->paginate($paging);
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

    public function find_asset($id)
    {
        return $this->suitabilityAsset->find($id);
    }  

    public function create_asset(Request $request)
    {
        return $this->suitabilityAsset->create($request->all());        
    }  
    
    public function update_asset($id,Request $request)
    {
        $suitabilityAsset = $this->find_asset($id);  
        return $suitabilityAsset->update($request->all()); 
    }
 
    public function delete_asset($id)
    {
        $suitabilityAsset = $this->find_asset($id);  
        if (is_null($suitabilityAsset)) {
            return false;
        }
        return $suitabilityAsset->delete();
    }

    public function find_asset_test($id)
    {
        return $this->suitabilityAssetTest->find($id);
    }  

    public function get_asset_test($asset_id = 0,$result_id = 0)
    {
        if($asset_id == 0 &&$result_id == 0)
        {
             return $this->suitabilityAssetTest->all();
        }
        else if($asset_id > 0 &&$result_id == 0)
        {
            return $this->suitabilityAssetTest
                ->where('suitability_asset_id','=',$asset_id) 
                ->get();
        }
        else if($asset_id == 0 &&$result_id > 0)
        {
            return $this->suitabilityAssetTest
                ->where('suitability_result_id','=',$result_id) 
                ->get();
        }
        else
        {
            return $this->suitabilityAssetTest
                ->where('suitability_asset_id','=',$asset_id)
                ->where('suitability_result_id','=',$result_id)
                ->get();
        }

    }  

    public function create_asset_test(Request $request)
    {
        return $this->suitabilityAssetTest->create($request->all());        
    }    

     public function delete_asset_test($id)
    {
        $suitabilityAssetTest = $this->find_asset_test($id);  
        if (is_null($suitabilityAssetTest)) {
            return false;
        }
        return $suitabilityAssetTest->delete();
    }     

    public function find_fund_test($id)
    {
        return $this->suitabilityTestFund->find($id);
    }  

    public function find_fund_test_by_result_id($id)
    {
        return $this->suitabilityTestFund->where('suitability_result_id','=',$id)->get();
    }  

    public function create_fund_test(Request $request)
    {
        return $this->suitabilityTestFund->create($request->all());        
    }    

     public function delete_fund_test($id)
    {
        $suitabilityTestFund = $this->find_fund_test($id);  
        if (is_null($suitabilityTestFund)) {
            return false;
        }
        return $suitabilityTestFund->delete();
    }     
}