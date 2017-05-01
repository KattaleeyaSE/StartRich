<?php

namespace App\IRepositories;

use Illuminate\Http\Request;


interface ISuitabilityTestRepository
{

    /**
     * Display all rows in the requestbase for this entity.
     * 
     *
     * @return Collection
     */        
    public function all();

    /**
     * Display all rows in the requestbase for this entity.
     *
     * @param int amc_id
     *
     * @return Request
     */        
    public function all_pagination($paging);

    /**
     * Display all rows in the requestbase for this entity.
     *
     * @param int amc_id
     *
     * @return Request
     */        
    public function all_by_amc_id_pagination($amc_id,$paging);

    /**
     * @param int id
     *
     * @return SuitabilityTest Object
    **/     
    public function find($id);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return SuitabilityTest Object
    **/     
    public function create(Request $request);

     /**
     * @param Illuminate\Http\Request $request
     * @param int id
     *
     * @return SuitabilityTest Object
    **/    
    public function update($id, Request $request);

    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete($id);
    
    /**
     * @param int id
     *
     * @return SuitabilityTestResult Object
    **/     
    public function find_result($id);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return SuitabilityTestResult Object
    **/    
    public function create_result(Request $request);

    /**
     * @param Illuminate\Http\Request $request
     * @param int id
     *
     * @return SuitabilityTestResult Object
    **/    
    public function update_result($id,Request $request);

    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete_result($id);   
    
    /**
     * @param int id
     *
     * @return SuitabilityTestQuestion Object
    **/     
    public function find_question($id);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return SuitabilityTestQuestion Object
    **/    
    public function create_question(Request $request);

    /**
     * @param Illuminate\Http\Request $request
     * @param int id
     *
     * @return SuitabilityTestQuestion Object
    **/    
    public function update_question($id,Request $request);

    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete_question($id);   
    
    /**
     * @param int id
     *
     * @return SuitabilityQuestionAnswer Object
    **/     
    public function find_answer($id);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return SuitabilityQuestionAnswer Object
    **/    
    public function create_answer(Request $request);

    /**
     * @param Illuminate\Http\Request $request
     * @param int id
     *
     * @return SuitabilityQuestionAnswer Object
    **/    
    public function update_answer($id,Request $request);

    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete_answer($id);   

    
    /**
     * @param int id
     *
     * @return SuitabilityAsset Object
    **/     
    public function find_asset($id);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return SuitabilityAsset Object
    **/    
    public function create_asset(Request $request);

    /**
     * @param Illuminate\Http\Request $request
     * @param int id
     *
     * @return SuitabilityAsset Object
    **/    
    public function update_asset($id,Request $request);

    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete_asset($id);   

    /**
     * @param int id
     *
     * @return SuitabilityAssetTest Object
    **/     
    public function find_asset_test($id);

    /**
     * @param int asset_id
     * @param int result_id
     *
     * @return Collection SuitabilityAssetTest
    **/     
    public function  get_asset_test($asset_id = 0,$result_id = 0);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return SuitabilityAssetTest Object
    **/    
    public function create_asset_test(Request $request);    
 
    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete_asset_test($id);        
}