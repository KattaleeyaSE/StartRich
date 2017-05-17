<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\PastPerformanceRecord;
class PastPerformanceRecordTest extends TestCase
{
    function testGetThreeMonthAttribute_NotNull()
    {
        $model = PastPerformanceRecord::first(); 
        $expected = 1.0;

        //Test  
        $result = $model->getThreeMonthAttribute();   
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException Error 
      * @expectedExceptionMessage Call to a member function getThreeMonthAttribute() on null
      */
    public function testThreeMonthAttribute_Null()
    {
        //Set 
        $model = PastPerformanceRecord::find(9999); 
        $model->getThreeMonthAttribute();   
        //Test 
        $this->assertNull($model);
    } 

    function testSixMonthAttribute_NotNull()
    {
        $model = PastPerformanceRecord::first(); 
        $expected = 1.0;

        //Test  
        $result = $model->getSixMonthAttribute();   
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException Error 
      * @expectedExceptionMessage Call to a member function getSixMonthAttribute() on null
      */
    public function testSixMonthAttribute_Null()
    {
        //Set 
        $model = PastPerformanceRecord::find(9999); 
        $model->getSixMonthAttribute();   
        //Test 
        $this->assertNull($model);
    } 

    function testOneYearAttribute_NotNull()
    {
        $model = PastPerformanceRecord::first(); 
        $expected = 1.0;

        //Test  
        $result = $model->getOneYearAttribute();   
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException Error 
      * @expectedExceptionMessage Call to a member function getOneYearAttribute() on null
      */
    public function testOneYearAttribute_Null()
    {
        //Set 
        $model = PastPerformanceRecord::find(9999); 
        $model->getOneYearAttribute();   
        //Test 
        $this->assertNull($model);
    } 

    function testThreeYearAttribute_NotNull()
    {
        $model = PastPerformanceRecord::first(); 
        $expected = 1.0;

        //Test  
        $result = $model->getThreeYearAttribute();   
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException Error 
      * @expectedExceptionMessage Call to a member function getThreeYearAttribute() on null
      */
    public function testThreeYearAttribute_Null()
    {
        //Set 
        $model = PastPerformanceRecord::find(9999); 
        $model->getThreeYearAttribute();   
        //Test 
        $this->assertNull($model);
    } 

    function testFiveYearAttribute_NotNull()
    {
        $model = PastPerformanceRecord::first(); 
        $expected = 1.0;

        //Test  
        $result = $model->getFiveYearAttribute();   
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException Error 
      * @expectedExceptionMessage Call to a member function getFiveYearAttribute() on null
      */
    public function testFiveYearAttribute_Null()
    {
        //Set 
        $model = PastPerformanceRecord::find(9999); 
        $model->getFiveYearAttribute();   
        //Test 
        $this->assertNull($model);
    } 

    function testTenYearAttribute_NotNull()
    {
        $model = PastPerformanceRecord::first(); 
        $expected = 1.0;

        //Test  
        $result = $model->getTenYearAttribute();   
        $this->assertEquals($expected,$result);        
    }


     /**
      * @expectedException Error 
      * @expectedExceptionMessage Call to a member function getTenYearAttribute() on null
      */
    public function testTenYearAttribute_Null()
    {
        //Set 
        $model = PastPerformanceRecord::find(9999); 
        $model->getTenYearAttribute();   
        //Test 
        $this->assertNull($model);
    } 
}
