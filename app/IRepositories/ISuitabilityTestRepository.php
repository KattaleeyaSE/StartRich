<?php

namespace App\IRepositories;

use Illuminate\Http\Request;


interface ISuitabilityTestRepository
{

    /**
     * Display all rows in the database for this entity.
     * 
     *
     * @return Collection
     */        
    public function all();

    /**
     * Display all rows in the database for this entity.
     *
     * @param int amc_id
     *
     * @return Collection
     */        
    public function all_by_amc_id($amc_id);

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
     * @param int id
     *
     * @return SuitabilityTestResult Object
    **/    
    public function create_result($id, Request $request);

    /**
     * @param Illuminate\Http\Request $request
     * @param int id
     *
     * @return SuitabilityTestResult Object
    **/    
    public function update_result($id, Request $request);

    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete_result($id);   
}