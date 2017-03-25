<?php

namespace App\IServices;

use Illuminate\Http\Request;
use App\Models\SuitabilityTest;


interface ISuitabilityTestService
{

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return SuitabilityTest Object
    **/     
    public function create_test(Request $request);

    /**
     * @param Illuminate\Http\Request $request
     * @param SuitabilityTest $suitabilityTest
     *
     * @return SuitabilityTestResult Collection
    **/     
    public function create_result(Request $request,SuitabilityTest $suitabilityTest);

    /**
     * @param Illuminate\Http\Request $request
     * @param SuitabilityTest $suitabilityTest
     *
     * @return SuitabilityTestQuestion Collection
    **/     
    public function create_question_answer(Request $request,SuitabilityTest $suitabilityTest);

    /**
     * @param Illuminate\Http\Request $request
     *
     * @return SuitabilityTest Object
    **/     
    public function update_test(Request $request);

    /**
     * @param Illuminate\Http\Request $request
     * @param SuitabilityTest $suitabilityTest
     *
     * @return SuitabilityTestResult Collection
    **/     
    public function update_result(Request $request,SuitabilityTest $suitabilityTest);

    /**
     * @param Illuminate\Http\Request $request
     * @param SuitabilityTest $suitabilityTest
     *
     * @return SuitabilityTestQuestion Collection
    **/     
    public function update_question_answer(Request $request,SuitabilityTest $suitabilityTest);

    /**
     * @param Array $request
     *
     * @return SuitabilityTestMember
    **/     
    public function create_take_test(array $data);

    /**
     * @param int id
     *
     * @return SuitabilityTestResult
    **/     
    public function get_test_result($id);
    
    /**
     * @param Illuminate\Http\Request $request
     *
     * @return SuitabilityTestResult
    **/     
    public function get_temporary_test_result(Request $request);

}