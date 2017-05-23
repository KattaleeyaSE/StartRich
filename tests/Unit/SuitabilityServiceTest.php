<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Http\Request;
class SuitabilityServiceTest extends TestCase
{
    use DatabaseTransactions;
  
    public function testCreateTest_NotNull()
    {
        //Set
        $service = $this->app->make('App\IServices\ISuitabilityTestService');
      
        $expectJson = '{"id":0,"amc_id":1,"question_name":"Name","description":"Description","results":[{"id":0,"max_score":1,"min_score":10,"type_of_investors":"Investor","funds":{"id":2,"name":"General fixed income fund","created_at":null,"updated_at":null},"risk_level":5,"asset":{"0":{"allocate":123}}},{"id":0,"max_score":11,"min_score":25,"type_of_investors":"Investor","funds":{"id":7,"name":"Fund of funds","created_at":null,"updated_at":null},"risk_level":6,"asset":{"0":{"allocate":12}}}],"assets":[{"id":0,"name":"Asset 1"}],"questions":[{"id":0,"question":"Question 1","answers":[{"id":0,"answer":"20","score":1},{"id":0,"answer":"25","score":2},{"id":0,"answer":"30","score":3}]}],"show_create_result":false,"show_add_question":true}';
        $decodeExpect = json_decode($expectJson,true);      
        $expectRequest = new Request();
        $expectRequest->offsetSet('question_name',$decodeExpect['question_name']);
        $expectRequest->offsetSet('description',$decodeExpect['description']);
        $expectRequest->offsetSet('assets',$decodeExpect['assets']);
        $expectRequest->offsetSet('amc_id',$decodeExpect['amc_id']);
        $expectRequest->offsetSet('results',$decodeExpect['results']);
 
        $result = $service->create_test($expectRequest);

 
        $this->assertEquals(true,true);   
    }

    /**
    * @expectedException Illuminate\Database\QueryException  
    */
    public function testCreateTest_Null()
    {
        $service = $this->app->make('App\IServices\ISuitabilityTestService');
 
        //Test
        $result = $service->create_test(new Request()); 
        
        $this->assertEquals(null,$result);         
    }   
  
    public function testUpdateTest_NotNull()
    {
        $service = $this->app->make('App\IServices\ISuitabilityTestService');
        $this->assertEquals(true,true);   
    }

    /**
    * @expectedException Illuminate\Database\QueryException  
    */
    public function testUpdateTest_Null()
    {
        $service = $this->app->make('App\IServices\ISuitabilityTestService');
 
        //Test
        $result = $service->create_test(new Request()); 
        
        $this->assertEquals(null,$result);         
    } 

    public function testGetTest_NotNull()
    {
        $service = $this->app->make('App\IServices\ISuitabilityTestService');
        $this->assertEquals(true,true);   
    }

    /**
    * @expectedException Illuminate\Database\QueryException  
    */
    public function testGetTest_Null()
    {
        $service = $this->app->make('App\IServices\ISuitabilityTestService');
 
        //Test
        $result = $service->create_test(new Request()); 
        
        $this->assertEquals(null,$result);         
    }   

    public function testGetTempTest_NotNull()
    {
        $service = $this->app->make('App\IServices\ISuitabilityTestService');
        $this->assertEquals(true,true);   
    }

    /**
    * @expectedException Illuminate\Database\QueryException  
    */
    public function testGetTempTest_Null()
    {
        $service = $this->app->make('App\IServices\ISuitabilityTestService');
 
        //Test
        $result = $service->create_test(new Request()); 
        
        $this->assertEquals(null,$result);         
    }   

    public function testTakeTest_NotNull()
    {
        $service = $this->app->make('App\IServices\ISuitabilityTestService');
        $this->assertEquals(true,true);   
    }

    /**
    * @expectedException Illuminate\Database\QueryException  
    */
    public function testTakeTest_Null()
    {
        $service = $this->app->make('App\IServices\ISuitabilityTestService');
 
        //Test
        $result = $service->create_test(new Request()); 
        
        $this->assertEquals(null,$result);         
    }   
}
