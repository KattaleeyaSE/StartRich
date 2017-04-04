<?php

namespace App\IRepositories;

use Illuminate\Http\Request;

interface IEstimateProfileRepository
{

    /**
     * Display all rows in the database for this entity.
     *
     * @return Collection
     */    
    public function all();

    /**
     * Display all rows in the database for this entity.
     *
     * @param int $id
     *
     * @return Collection
     */    
    public function all_by_member_id($id);

     /**
     * @param int id
     *
     * @return EstimateProfile Object
    **/    
    public function find($id);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return EstimateProfile Object
    **/ 
    public function create(Request $request);

    /**
     * @param Illuminate\Http\Request $request
     * @param int id
     *
     * @return EstimateProfile Object
    **/ 
    public function update($id, Request $request);
    
    /**
    * @param int id
    *
    * @return boolean
    **/
    public function delete($id);
}