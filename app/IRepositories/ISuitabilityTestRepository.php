<?php

namespace App\IRepositories;

use Illuminate\Http\Request;


interface ISuitabilityTestRepository
{

    /**
     * Display all rows in the database for this entity.
     *
     * @return Collection
     */        
    public function all();

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
}