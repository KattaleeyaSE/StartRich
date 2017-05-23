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
      
        $expect = [ 
                "amc_id" => 1,
                "question_name" => "Name",
                "description" => "Description",
                "results" => [
                 [
                    "max_score" => 1,
                    "min_score" => 10,
                    "type_of_investors" => "Type",
                    "funds" =>  [
                        "id" => 5, 
                    ],
                    "risk_level" => 5,
                    "asset" => [ 
                        "allocate" => 1 
                    ],
                ],
                [
                    "max_score" => 11,
                    "min_score" => 20,
                    "type_of_investors" => null,
                    "funds" => [
                        "id" => 7, 
                    ],
                        "risk_level" => 6,
                        "asset" => [ 
                            "allocate" => 1 
                        ],
                ]
                ],
                "assets" => [
                    [
                     "name" => "Asset"
                    ]
                ],
                "questions" =>[
                   [ 
                    "question" => "Question 1",
                        "answers" => [
                            [ 
                                "answer" => "5",
                                "score" => 10
                            ],
                            [ 
                                "answer" => "10",
                                "score" => 15
                            ],
                            [ 
                                "answer" => "15",
                                "score" => 20
                            ]
                        ]
                    ],
                    [ 
                        "question" => "Question 2",
                        "answers" => [
                            [ 
                                "answer" => "10",
                                "score" => 1
                            ],
                            [ 
                                "answer" => "20",
                                "score" => 2
                            ]
                        ]
                    ]
                ],
            "show_create_result" => false,
            "show_add_question" => true
        ];

        $expectRequest = new Request();
        $expectRequest->offsetSet('question_name',$expect['question_name']);
        $expectRequest->offsetSet('description',$expect['description']);
        $expectRequest->offsetSet('amc_id',$expect['amc_id']);
        $expectRequest->offsetSet('results',$expect['results']);
 
        $result = $service->create_test($expectRequest);

        dd($result);
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
