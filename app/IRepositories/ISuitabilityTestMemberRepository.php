<?php

namespace App\IRepositories;

use Illuminate\Http\Request;


interface ISuitabilityTestMemberRepository
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
     * @param int paging
     *
     * @return Request
     */        
    public function all_pagination($paging);

    /**
     * Display all rows in the requestbase for this entity.
     *
     * @param int member_id
     *
     * @return Request
     */        
    public function all_by_member_id_pagination($member_id,$paging);

    /**
     * @param int id
     *
     * @return suitabilityTestMember Object
    **/     
    public function find($id);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return suitabilityTestMember Object
    **/     
    public function create(Request $request);

     /**
     * @param Illuminate\Http\Request $request
     * @param int id
     *
     * @return suitabilityTestMember Object
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
     * @return SuitabilityTestMemberAnswer Object
    **/     
    public function find_answer($id);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return SuitabilityTestMemberAnswer Object
    **/     
    public function create_answer(Request $request);

     /**
     * @param Illuminate\Http\Request $request
     * @param int id
     *
     * @return SuitabilityTestMemberAnswer Object
    **/    
    public function update_answer($id, Request $request);

    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete_answer($id);
    
}