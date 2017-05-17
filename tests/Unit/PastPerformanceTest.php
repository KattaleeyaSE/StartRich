<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\PastPerformance;
class PastPerformanceTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetRelationPastPerformanceFund_NotNull()
    {
        //Set 
        $model = PastPerformance::first(); 
        $expected = [ 
                "id" => 1,
                "amc_id" => 1,
                "name" => "Fund 1",
                "code" => "F1111",
                "type" => "Equity fund",
                "aimc_type" => "EQSM",
                "management_company" => "Company 1",
                "trustee" => "trustee",
                "payment_policy" => 1,
                "frequency" => "frequency",
                "approved_by" => "approved_by",
                "supervision" => "supervision",
                "protected_fund" => 1,
                "name_of_guarantor" => "name_of_guarantor",
                'fund_start' => '2017-05-13',
                'fund_end' => '2017-05-13',
                "risk_level" => 1,
                "net_asset_value" => 1,
                "investment_asset_detail" => "investment_asset_detail",
                "strategy_detail" => "strategy_detail",
                "factor_impact" => "factor_impact",
                "benchmark_detail" => "benchmark_detail",
                "type_of_investor" => "type_of_investor",
                "major_risk_factor" => "major_risk_factor",
            ];
        //Test 
        $result = $model->fund->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']);
        $this->assertInstanceOf('\App\Models\MutualFund',$model->fund);
        $this->assertEquals($expected,$result);
    }
 
     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationPastPerformanceFund_Null()
    {
        //Set 
        $model = PastPerformance::find(9999); 
        $model->fund;
        //Test 
        $this->assertNull($model);
    }


    public function testGetRelationPastPerformanceFundReturn_NotNull()
    {
        //Set 
        $model = PastPerformance::first(); 
        $expected = [ 
                'id' => 1,
                'past_performance_id' => 1,            
                "name" => "Fund 1",
                "3month" => 1.0,
                "6month" => 1.0,
                "1year" => 1.0,
                "3year" => 1.0,
                "5year" => 1.0,
                "10year" => 1.0,
                "since_inception" => 1.0
            ];
        //Test 
        $result = $model->fundReturn()->getAttributes();   
        unset($result['updated_at']);
        unset($result['created_at']);
        $this->assertInstanceOf('\App\Models\PastPerformanceRecord',$model->fundReturn());
        $this->assertEquals($expected,$result);
    }
 
     /**
      * @expectedException Error 
      * @expectedExceptionMessage Call to a member function fundReturn() on null
      */
    public function testGetRelationPastPerformanceFundReturn_Null()
    {
        //Set 
        $model = PastPerformance::find(9999); 
        $model->fundReturn();
        //Test 
        $this->assertNull($model);
    }

    public function testGetRelationPastPerformanceBenchmark1_NotNull()
    {
        //Set 
        $model = PastPerformance::first(); 
        $expected = [ 
                    "id" => 2,
                    "past_performance_id" => 1,
                    "name" => "Benchmark 1",
                    "3month" => 2.0,
                    "6month" => 2.0,
                    "1year" => 2.0,
                    "3year" => 2.0,
                    "5year" => 2.0,
                    "10year" => 2.0,
                    "since_inception" => 2.0
            ];
        //Test 
        $result = $model->benchmark1()->getAttributes();
        unset($result['updated_at']);
        unset($result['created_at']);
        $this->assertInstanceOf('\App\Models\PastPerformanceRecord',$model->benchmark1());
        $this->assertEquals($expected,$result);
    }
 
     /**
      * @expectedException Error 
      * @expectedExceptionMessage Call to a member function benchmark1() on null
      */
    public function testGetRelationPastPerformanceBenchmark1_Null()
    {
        //Set 
        $model = PastPerformance::find(9999); 
        $model->benchmark1();
        //Test 
        $this->assertNull($model);
    }

    public function testGetRelationPastPerformanceInformationRatio_NotNull()
    {
        //Set 
        $model = PastPerformance::first(); 
        $expected = [ 
                "id" => 3,
                "past_performance_id" => 1,
                "name" => "Information Ratio",
                "3month" => 3.0,
                "6month" => 3.0,
                "1year" => 3.0,
                "3year" => 3.0,
                "5year" => 3.0,
                "10year" => 3.0,
                "since_inception" => 3.0
            ];
        //Test 
        $result = $model->information_ratio()->getAttributes();   
        unset($result['updated_at']);
        unset($result['created_at']);
        $this->assertInstanceOf('\App\Models\PastPerformanceRecord',$model->information_ratio());
        $this->assertEquals($expected,$result);
    }
 
     /**
      * @expectedException Error 
      * @expectedExceptionMessage Call to a member function information_ratio() on null
      */
    public function testGetRelationPastPerformanceInformationRatio_Null()
    {
        //Set 
        $model = PastPerformance::find(9999); 
        $model->information_ratio();
        //Test 
        $this->assertNull($model);
    }

    public function testGetRelationPastPerformanceStandardDeviation_NotNull()
    {
        //Set 
        $model = PastPerformance::first(); 
        $expected = [ 
                "id" => 4,
                "past_performance_id" => 1,
                "name" => "Standard Deviation",
                "3month" => 4.0,
                "6month" => 4.0,
                "1year" => 4.0,
                "3year" => 4.0,
                "5year" => 4.0,
                "10year" => 4.0,
                "since_inception" => 4.0
            ];
        //Test 
        $result = $model->standard_deviation()->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']);
        $this->assertInstanceOf('\App\Models\PastPerformanceRecord',$model->standard_deviation());
        $this->assertEquals($expected,$result);
    }
 
     /**
      * @expectedException Error 
      * @expectedExceptionMessage Call to a member function standard_deviation() on null
      */
    public function testGetRelationPastPerformanceStandard_Deviation_Null()
    {
        //Set 
        $model = PastPerformance::find(9999); 
        $model->standard_deviation();
        //Test 
        $this->assertNull($model);
    }

    function testGetRelationPastPerformanceRecords_NotNull()
    {
        $model = PastPerformance::first(); 
         
        $expect = 4;

        //Test  
        $result = $model->records; 
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->records);
        $this->assertEquals($expect,sizeof($result));  


    }

    public function testGetRelationPastPerformanceRecords_Value_NotNull()
    {
        $test = PastPerformance::first(); 
        $expected_first = [ 
                'id' => 1,
                'past_performance_id' => 1,            
                "name" => "Fund 1",
                "3month" => 1.0,
                "6month" => 1.0,
                "1year" => 1.0,
                "3year" => 1.0,
                "5year" => 1.0,
                "10year" => 1.0,
                "since_inception" => 1.0
             ];


        $expected_second = [ 
                "id" => 2,
                "past_performance_id" => 1,
                "name" => "Benchmark 1",
                "3month" => 2.0,
                "6month" => 2.0,
                "1year" => 2.0,
                "3year" => 2.0,
                "5year" => 2.0,
                "10year" => 2.0,
                "since_inception" => 2.0
             ];

        $expected_third = [ 
                "id" => 3,
                "past_performance_id" => 1,
                "name" => "Information Ratio",
                "3month" => 3.0,
                "6month" => 3.0,
                "1year" => 3.0,
                "3year" => 3.0,
                "5year" => 3.0,
                "10year" => 3.0,
                "since_inception" => 3.0
             ];

        $expected_fourth = [ 
                "id" => 4,
                "past_performance_id" => 1,
                "name" => "Standard Deviation",
                "3month" => 4.0,
                "6month" => 4.0,
                "1year" => 4.0,
                "3year" => 4.0,
                "5year" => 4.0,
                "10year" => 4.0,
                "since_inception" => 4.0
             ];


        //Test  
        $result = $test->records;

        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']); 

        $result_second = $result[1]->getAttributes();
        unset($result_second['updated_at']);
        unset($result_second['created_at']); 

        $result_third = $result[2]->getAttributes();
        unset($result_third['updated_at']);
        unset($result_third['created_at']); 

        $result_fourth = $result[3]->getAttributes();
        unset($result_fourth['updated_at']);
        unset($result_fourth['created_at']); 
 
        $this->assertEquals($expected_first,$result_first);   
        $this->assertEquals($expected_second,$result_second);     
        $this->assertEquals($expected_third,$result_third);     
        $this->assertEquals($expected_fourth,$result_fourth);     
    }

     /**
      * @expectedException ErrorException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testGetRelationPastPerformanceRecords_Null()
    {
        //Set 
        $model = PastPerformance::find(9999); 
        $model->records;
        //Test 
        $this->assertNull($model);
    } 

    public function testCreateRecordsFromPastPerformance_NotNull()
    {
        //Set 
        $model = PastPerformance::first();
        $expect = [
            "past_performance_id" => $model->id,
            "name" => "testing",
            "3month" => 1.0,
            "6month" => 1.0,
            "1year" => 1.0,
            "3year" => 1.0,
            "5year" => 1.0,
            "10year" => 1.0,
            "since_inception" => 1.0,
        ];

        $model->records()->create($expect);

        //Assert
        $result = $model->records->where('name','=','testing')->first();
        $resultArray = $result->getAttributes();
        unset($resultArray['id']);
        unset($resultArray['updated_at']);
        unset($resultArray['created_at']);  
        
        $this->assertInstanceOf('\App\Models\PastPerformanceRecord',$result);
        $this->assertEquals($expect,$resultArray);  
    }

     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreateRecordsFromPastPerformance_Name_Null()
    {
        //Set 
        $model = PastPerformance::first();
        $createData = [
            "name" => null,
            "3month" => 1.0,
            "6month" => 1.0,
            "1year" => 1.0,
            "3year" => 1.0,
            "5year" => 1.0,
            "10year" => 1.0,
        ];

        $model->records()->create($createData);

        //Assert
        $result = $model->records->where('name','=',null)->first(); 
        $this->assertNull($result);
    }

     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreateRecordsFromPastPerformance_Decimal_Null()
    {
        //Set 
        $model = PastPerformance::first();
        $createData = [
            "name" => "not null",
            "3month" => null,
            "6month" => 1.0,
            "1year" => 1.0,
            "3year" => 1.0,
            "5year" => 1.0,
            "10year" => 1.0,
        ];

        $model->records()->create($createData);

        //Assert
        $result = $model->records->where('name','=','not null')->first(); 
        $this->assertNull($result);
    }
}
