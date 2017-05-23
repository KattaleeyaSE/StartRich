<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\MutualFund;
class FundTest extends TestCase
{
    use DatabaseTransactions;
   
    public function testGetRelationFundAMC_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = [ 
                "id" => 1,
                "company_name" => "company_name",
                "phone_number" => "+66123456789",
                "address" => "address",
                "user_id" => 3
             ];

        //Test  
        $result = $model->amc->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']); 
        $this->assertInstanceOf('\App\Models\AMC',$model->amc);
        $this->assertEquals($expected,$result);  
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundAMC_Null()
    {
        $model = MutualFund::find(9999); 
        $model->amc;
        //Test 
        $this->assertNull($model);
    }

    public function testGetRelationFundNAV_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = [ 
                "id" => 1,
                "standard" => 100.0,
                "bid" => 100.0,
                "offer" => 100.0,
                "fund_id" => 1,
                "modified_date" => "2017-01-01"
             ];

        //Test  
        $result = $model->nav->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']);  
        $this->assertInstanceOf('\App\Models\NAV',$model->nav);
        $this->assertEquals($expected,$result);  
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundNAV_Null()
    {
        $model = MutualFund::find(9999); 
        $model->nav;
        //Test 
        $this->assertNull($model);
    }

    public function testGetRelationFundNAVS_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = 2;

        //Test  
        $result = $model->navs;   
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->navs);
        $this->assertEquals($expected,sizeof($result));  
    }

    public function testGetRelationPastPerformanceRecords_Value_NotNull()
    {
        $model = MutualFund::first(); 
        $expected_first = [ 
                "id" => 1,
                "standard" => 100.0,
                "bid" => 100.0,
                "offer" => 100.0,
                "fund_id" => 1,
                "modified_date" => "2017-01-01"
             ];


        $expected_second = [ 
                "id" => 6,
                "standard" => 100.0,
                "bid" => 100.0,
                "offer" => 100.0,
                "fund_id" => 1,
                "modified_date" => "2017-04-16"
             ];
 

        //Test  
        $result = $model->navs;

        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']); 

        $result_second = $result[1]->getAttributes();
        unset($result_second['updated_at']);
        unset($result_second['created_at']);  
 
        $this->assertEquals($expected_first,$result_first);   
        $this->assertEquals($expected_second,$result_second);     
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundNAVS_Null()
    {
        $model = MutualFund::find(9999); 
        $model->navs;
        //Test 
        $this->assertNull($model);
    }

    public function testGetRelationFundDividendPayments_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = 6;

        //Test  
        $result = $model->dividend_payments;   

        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->dividend_payments);
        $this->assertEquals($expected,sizeof($result));  
    }

    public function testGetRelationFundDividendPayments_Value_NotNull()
    {
        $model = MutualFund::first(); 
        $expected_first = [ 
                "id" => 1,
                "fund_id" => 1,
                "payment_date" => "2016-12-16",
                "dividend_price" => 0.05
             ];


        $expected_second = [ 
                "id" => 2,
                "fund_id" => 1,
                "payment_date" => "2017-01-16",
                "dividend_price" => 0.05
             ];
 
        $expected_third = [ 
                "id" => 3,
                "fund_id" => 1,
                "payment_date" => "2017-02-16",
                "dividend_price" => 0.05
             ];


        $expected_fourth = [ 
                "id" => 4,
                "fund_id" => 1,
                "payment_date" => "2017-03-16",
                "dividend_price" => 0.05
             ];

        $expected_fifth = [ 
                "id" => 5,
                "fund_id" => 1,
                "payment_date" => "2017-03-31",
                "dividend_price" => 0.05
             ];
 

        $expected_sixth = [ 
                "id" => 6,
                "fund_id" => 1,
                "payment_date" => "2017-04-16",
                "dividend_price" => 0.05
             ];
 

        //Test  
        $result = $model->dividend_payments;
 
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

        $result_fifth = $result[4]->getAttributes();
        unset($result_fifth['updated_at']);
        unset($result_fifth['created_at']);  

        $result_sixth = $result[5]->getAttributes();
        unset($result_sixth['updated_at']);
        unset($result_sixth['created_at']);  
 
        $this->assertEquals($expected_first,$result_first);   
        $this->assertEquals($expected_second,$result_second);     
        $this->assertEquals($expected_third,$result_third);     
        $this->assertEquals($expected_fourth,$result_fourth);     
        $this->assertEquals($expected_fifth,$result_fifth);     
        $this->assertEquals($expected_sixth,$result_sixth);     
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundDividendPayments_Null()
    {
        $model = MutualFund::find(9999); 
        $model->dividend_payments;
        //Test 
        $this->assertNull($model);
    }

    public function testGetRelationFundFundManagers_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = 1;

        //Test  
        $result = $model->fund_managers;   
        
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->dividend_payments);
        $this->assertEquals($expected,sizeof($result));  
    }

    public function testGetRelationFundFundManagers_Value_NotNull()
    {
        $model = MutualFund::first(); 
        $expected_first = [ 
                "id" => 1,
                "fund_id" => 1,
                "name" => "name",
                "position" => "position",
                "management_date" => "2017-05-01"
             ]; 
 

        //Test  
        $result = $model->fund_managers;
 
        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);  
 
        $this->assertEquals($expected_first,$result_first);     
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundFundManagers_Null()
    {
        $model = MutualFund::find(9999); 
        $model->fund_managers;
        //Test 
        $this->assertNull($model);
    }

    public function testGetRelationFundPortfolios_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = 1;

        //Test  
        $result = $model->portfolios;   

        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->dividend_payments);
        $this->assertEquals($expected,sizeof($result));  
    }

    public function testGetRelationFundPortfolios_Value_NotNull()
    {
        $model = MutualFund::first(); 
        $expected_first = [ 
                    "id" => 1,
                    "fund_id" => 1,
                    "name" => "name",
                    "stock" => 1.0,
                    "bond" => 1.0,
                    "cash" => 1.0,
                    "other" => 1.0
             ]; 
 

        //Test  
        $result = $model->portfolios;
 
        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);   
 
        $this->assertEquals($expected_first,$result_first);     
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundPortfolios_Null()
    {
        $model = MutualFund::find(9999); 
        $model->portfolios;
        //Test 
        $this->assertNull($model);
    }  

    public function testGetRelationFundPurchaseDetail_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = [ 
                    "id" => 1,
                    "fund_id" => 1,
                    "subscription_period" => "subscription_period",
                    "min_first_purchase" => "100",
                    "min_additional" => "100",
                    "redemtion_period" => "100",
                    "min_redemption" => "100",
                    "min_balance" => "100",
                    "settlement_period" => "100"
             ];

        //Test  
        $result = $model->purchase_detail->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']);   
        $this->assertInstanceOf('\App\Models\PurchaseDetail',$model->purchase_detail);
        $this->assertEquals($expected,$result);  
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundPurchaseDetail_Null()
    {
        $model = MutualFund::find(9999); 
        $model->purchase_detail;
        //Test 
        $this->assertNull($model);
    }      

    public function testGetRelationFundAssetAllocation_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = [ 
                    "id" => 1,
                    "fund_id" => 1,
                    "stock" => 123.0,
                    "bond" => 123.0,
                    "cash" => 123.0,
                    "other" => 123.0
             ];

        //Test  
        $result = $model->asset_allocation->getAttributes(); 
        unset($result['updated_at']);
        unset($result['created_at']);   
        $this->assertInstanceOf('\App\Models\AssetAllocation',$model->asset_allocation);
        $this->assertEquals($expected,$result);  
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundAssetAllocation_Null()
    {
        $model = MutualFund::find(9999); 
        $model->asset_allocation;
        //Test 
        $this->assertNull($model);
    }    

    public function testGetRelationFundHoldingCompanies_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = 1;

        //Test  
        $result = $model->holding_companies;    
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->holding_companies);
        $this->assertEquals($expected,sizeof($result));  
    }

    public function testGetRelationFundHoldingCompanies_Value_NotNull()
    {
        $model = MutualFund::first(); 
        $expected_first = [ 
                "id" => 1,
                "fund_id" => 1,
                "name" => "name",
                "percentage" => 20.0
             ];


        //Test  
        $result = $model->holding_companies;
 
        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);  
        $this->assertEquals($expected_first,$result_first);   
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundHoldingCompanies_Null()
    {
        $model = MutualFund::find(9999); 
        $model->holding_companies;
        //Test 
        $this->assertNull($model);
    }     

    public function testGetRelationFundFees_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = 1;

        //Test  
        $result = $model->fees;   
 
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->fees);
        $this->assertEquals($expected,sizeof($result));  
    }

    public function testGetRelationFundFees_Value_NotNull()
    {
        $model = MutualFund::first(); 
        $expected_first = [ 
                "id" => 1,
                "fund_id" => 1,
                "front_end_fee" => 123.0,
                "actual_front_end_fee" => 123.0,
                "back_end_fee" => 123.0,
                "actual_back_end_fee" => 123.0,
                "switching_fee" => 123.0
             ]; 
 

        //Test  
        $result = $model->fees;
 
        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);   
 
        $this->assertEquals($expected_first,$result_first);      
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundFees_Null()
    {
        $model = MutualFund::find(9999); 
        $model->fees;
        //Test 
        $this->assertNull($model);
    }     

    public function testGetRelationFundExpenses_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = 1;

        //Test  
        $result = $model->expenses;    
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->expenses);
        $this->assertEquals($expected,sizeof($result));  
    }

    public function testGetRelationFundExpenses_Value_NotNull()
    {
        $model = MutualFund::first(); 
        $expected_first = [ 
                    "id" => 1,
                    "fund_id" => 1,
                    "manager_fee" => 10.0,
                    "actual_manager_fee" => 10.0,
                    "total_expense_ratio" => 10.0,
                    "trustee_fee" => 10.0,
                    "actual_trustee_fee" => 10.0,
                    "registrar_fee" => 10.0,
                    "actual_registrar_fee" => 10.0,
                    "other_fee" => 10.0
             ]; 
 

        //Test  
        $result = $model->expenses;
 
        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);    
        $this->assertEquals($expected_first,$result_first);      
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundExpenses_Null()
    {
        $model = MutualFund::find(9999); 
        $model->expenses;
        //Test 
        $this->assertNull($model);
    }  

     public function testGetRelationFundPastPerformances_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = 4;

        //Test  
        $result = $model->past_performances;   

        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->past_performances);
        $this->assertEquals($expected,sizeof($result));  
    }

    public function testGetRelationFundPastPerformances_Value_NotNull()
    {
        $model = MutualFund::first(); 
        $expected_first = [ 
                "id" => 1,
                "fund_id" => 1,
                "date" => "2017-01-17"
             ];


        $expected_second = [ 
                "id" => 5,
                "fund_id" => 1,
                "date" => "2017-02-17"
             ];
 
        $expected_third = [ 
                "id" => 9,
                "fund_id" => 1,
                "date" => "2017-03-17"
             ];


        $expected_fourth = [ 
                "id" => 13,
                "fund_id" => 1,
                "date" => "2017-04-17"
             ];
 
 

        //Test  
        $result = $model->past_performances;
 
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
    public function testGetRelationFundPastPerformances_Null()
    {
        $model = MutualFund::find(9999); 
        $model->past_performances;
        //Test 
        $this->assertNull($model);
    }      

     public function testGetRelationFundMembers_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = 1;

        //Test  
        $result = $model->members;   

        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->past_performances);
        $this->assertEquals($expected,sizeof($result));  
    }

    public function testGetRelationFundMembers_Value_NotNull()
    {
        $model = MutualFund::first(); 
        $expected_first = [ 
                "id" => 1,
                "firstname" => "firstname",
                "lastname" => "lastname",
                "phone_number" => "+66123456789",
                "user_id" => 2
             ];
  
        //Test  
        $result = $model->members;
 
        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);  
        $this->assertEquals($expected_first,$result_first);         
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundMembers_Null()
    {
        $model = MutualFund::find(9999); 
        $model->members;
        //Test 
        $this->assertNull($model);
    }      

     public function testGetRelationFundReviews_NotNull()
    {
        $model = MutualFund::first(); 
        $expected = 2;

        //Test  
        $result = $model->reviews;   

        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection',$model->past_performances);
        $this->assertEquals($expected,sizeof($result));  
    }

    public function testGetRelationFundReviews_Value_NotNull()
    {
        $model = MutualFund::first(); 
        $expected_first = [ 
                "id" => 1,
                "description" => "desc",
                "point" => 1,
                "fund_id" => 1,
                "member_id" => 1
             ];

        $expected_second = [ 
               "id" => 2,
                "description" => "desc",
                "point" => 1,
                "fund_id" => 1,
                "member_id" => 1
             ];
  
        //Test  
        $result = $model->reviews;
 
        $result_first = $result[0]->getAttributes();
        unset($result_first['updated_at']);
        unset($result_first['created_at']);  

        $result_second = $result[1]->getAttributes();
        unset($result_second['updated_at']);
        unset($result_second['created_at']);  

        $this->assertEquals($expected_first,$result_first);         
        $this->assertEquals($expected_second,$result_second);         
    }

    /**
    * @expectedException ErrorException 
    * @expectedExceptionMessage Trying to get property of non-object
    */
    public function testGetRelationFundReviews_Null()
    {
        $model = MutualFund::find(9999); 
        $model->reviews;
        //Test 
        $this->assertNull($model);
    }  


    public function testCreateAssetAllocationFromFund_NotNull()
    {
        //Set 
        $model = MutualFund::first();
        $expect = [ 
            "fund_id" =>$model->id,
            "stock" => 123.0,
            "bond" => 123.0,
            "cash" => 123.0,
            "other" => 9999.0
        ];

        $model->asset_allocation()->create($expect);

        //Assert
        $result = $model->asset_allocation->where('other','=',9999.0)->first();
        $resultArray = $result->getAttributes();
        unset($resultArray['id']);
        unset($resultArray['updated_at']);
        unset($resultArray['created_at']);  
        
        $this->assertInstanceOf('\App\Models\AssetAllocation',$result);
        $this->assertEquals($expect,$resultArray);  
    }  


     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreateAssetAllocationFromFund_Other_Null()
    {
        //Set 
        $model = MutualFund::first();
        $createData = [
            "fund_id" =>$model->id,
            "stock" => 123.0,
            "bond" => 123.0,
            "cash" => 123.0,
            "other" => null
        ];

        $model->asset_allocation()->create($createData);

        //Assert
        $result = $model->asset_allocation->where('other','=',null)->first(); 
        $this->assertNull($result);
    }

    public function testCreateNAVSFromFund_NotNull()
    {
        //Set 
        $model = MutualFund::first();
        $expect = [  
            "standard" => 9999.0,
            "bid" => 100.0,
            "offer" => 100.0,
            "fund_id" => $model->id,
            "modified_date" => "2017-12-01"
        ];

        $model->navs()->create($expect);

        //Assert
        $result = $model->navs->where('standard','=',9999.0)->first();
        $resultArray = $result->getAttributes();
        unset($resultArray['id']);
        unset($resultArray['updated_at']);
        unset($resultArray['created_at']);  
        
        $this->assertInstanceOf('\App\Models\NAV',$result);
        $this->assertEquals($expect,$resultArray);  
    }  


     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreateNAVSFromFund_Other_Null()
    {
        //Set 
        $model = MutualFund::first();
        $createData = [
            "standard" => null,
            "bid" => 100.0,
            "offer" => 100.0,
            "fund_id" => $model->id,
            "modified_date" => "2017-12-01"
        ];

        $model->navs()->create($createData);

        //Assert
        $result = $model->navs->where('standard','=',null)->first(); 
        $this->assertNull($result);
    }

    public function testCreateFundManagersFromFund_NotNull()
    {
        //Set 
        $model = MutualFund::first();
        $expect = [   
            "fund_id" =>$model->id,
            "name" => "testname",
            "position" => "position",
            "management_date" => "2017-05-01"
        ];

        $model->fund_managers()->create($expect);

        //Assert
        $result = $model->fund_managers->where('name','=','testname')->first();
        $resultArray = $result->getAttributes();
        unset($resultArray['id']);
        unset($resultArray['updated_at']);
        unset($resultArray['created_at']);  
        
        $this->assertInstanceOf('\App\Models\FundManager',$result);
        $this->assertEquals($expect,$resultArray);  
    }  


     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreateFundManagersFromFund_Name_Null()
    {
        //Set 
        $model = MutualFund::first();
        $createData = [
            "fund_id" =>$model->id,
            "name" => null,
            "position" => "position",
            "management_date" => "2017-05-01",
        ];

        $model->fund_managers()->create($createData);

        //Assert
        $result = $model->fund_managers->where('name','=',null)->first(); 
        $this->assertNull($result);
    }

    public function testCreateHoldingCompaniesFromFund_NotNull()
    {
        //Set 
        $model = MutualFund::first();
        $expect = [   
            "fund_id" =>$model->id,
            "name" => "testname", 
            "percentage" => 20.0
        ];

        $model->holding_companies()->create($expect);

        //Assert
        $result = $model->holding_companies->where('name','=','testname')->first();
        $resultArray = $result->getAttributes();
        unset($resultArray['id']);
        unset($resultArray['updated_at']);
        unset($resultArray['created_at']);  
        
        $this->assertInstanceOf('\App\Models\HoldingCompany',$result);
        $this->assertEquals($expect,$resultArray);  
    }  


     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreateHoldingCompaniesFromFund_Name_Null()
    {
        //Set 
        $model = MutualFund::first();
        $createData = [
            "fund_id" =>$model->id,
            "name" => null,
            "percentage" => 20.0
        ];

        $model->holding_companies()->create($createData);

        //Assert
        $result = $model->holding_companies->where('name','=',null)->first(); 
        $this->assertNull($result);
    }

    public function testCreateFeesFromFund_NotNull()
    {
        //Set 
        $model = MutualFund::first();
        $expect = [   
            "fund_id" =>$model->id, 
            "front_end_fee" => 123456.0,
            "actual_front_end_fee" => 123.0,
            "back_end_fee" => 123.0,
            "actual_back_end_fee" => 123.0,
            "switching_fee" => 123.0
        ];

        $model->fees()->create($expect);

        //Assert
        $result = $model->fees->where('front_end_fee','=',123456.0)->first();
        $resultArray = $result->getAttributes();
        unset($resultArray['id']);
        unset($resultArray['updated_at']);
        unset($resultArray['created_at']);  
        
        $this->assertInstanceOf('\App\Models\Fee',$result);
        $this->assertEquals($expect,$resultArray);  
    }  


     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreateFeesFromFund_FrontEndFee_Null()
    {
        //Set 
        $model = MutualFund::first();
        $createData = [
            "fund_id" =>$model->id,
            "front_end_fee" => null,
            "actual_front_end_fee" => 123.0,
            "back_end_fee" => 123.0,
            "actual_back_end_fee" => 123.0,
            "switching_fee" => 123.0
        ];

        $model->fees()->create($createData);

        //Assert
        $result = $model->fees->where('front_end_fee','=',null)->first(); 
        $this->assertNull($result);
    }

    public function testCreatePurchaseDetailsFromFund_NotNull()
    {
        //Set 
        $model = MutualFund::first();
        $expect = [   
            "fund_id" =>$model->id,   
            "subscription_period" => "subscription_period",
            "min_first_purchase" => "100",
            "min_additional" => "100",
            "redemtion_period" => "100",
            "min_redemption" => "100",
            "min_balance" => "12345678.0",
            "settlement_period" => "100" 
        ];

        $model->purchase_details()->create($expect);

        //Assert
        $result = $model->purchase_details->where('min_balance','=',12345678.0)->first();
        $resultArray = $result->getAttributes();
        unset($resultArray['id']);
        unset($resultArray['updated_at']);
        unset($resultArray['created_at']);  
        
        $this->assertInstanceOf('\App\Models\PurchaseDetail',$result);
        $this->assertEquals($expect,$resultArray);  
    }  


     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreatePurchaseDetailsFromFund_MinBalance_Null()
    {
        //Set 
        $model = MutualFund::first();
        $createData = [
            "fund_id" =>$model->id,   
            "subscription_period" => "subscription_period",
            "min_first_purchase" => "100",
            "min_additional" => "100",
            "redemtion_period" => "100",
            "min_redemption" => "100",
            "min_balance" => null,
            "settlement_period" => "100"            
        ];

        $model->purchase_details()->create($createData);

        //Assert
        $result = $model->purchase_details->where('min_balance','=',null)->first(); 
        $this->assertNull($result);
    }

    public function testCreatePastPerformancesFromFund_NotNull()
    {
        //Set 
        $model = MutualFund::first();
        $expect = [   
            "fund_id" =>$model->id,    
            "date" => "2017-01-01"  
        ];

        $model->past_performances()->create($expect);

        //Assert
        $result = $model->past_performances->where('date','=',"2017-01-01"  )->first();
        $resultArray = $result->getAttributes();
        unset($resultArray['id']);
        unset($resultArray['updated_at']);
        unset($resultArray['created_at']);  
        
        $this->assertInstanceOf('\App\Models\PastPerformance',$result);
        $this->assertEquals($expect,$resultArray);  
    }  


     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreatePastPerformancesFromFund_Date_Null()
    {
        //Set 
        $model = MutualFund::first();
        $createData = [
            "fund_id" =>$model->id,    
            "date" => null       
        ];

        $model->past_performances()->create($createData);

        //Assert
        $result = $model->past_performances->where('date','=',null)->first(); 
        $this->assertNull($result);
    }

    public function testCreateExpensesFromFund_NotNull()
    {
        //Set 
        $model = MutualFund::first();
        $expect = [   
            "fund_id" =>$model->id,    
            "manager_fee" => 10.0,
            "actual_manager_fee" => 10.0,
            "total_expense_ratio" => 10.0,
            "trustee_fee" => 10.0,
            "actual_trustee_fee" => 10.0,
            "registrar_fee" => 10.0,
            "actual_registrar_fee" => 10.0,
            "other_fee" => 9999.0
        ];

        $model->expenses()->create($expect);

        //Assert
        $result = $model->expenses->where('other_fee','=', 9999.0 )->first();
        $resultArray = $result->getAttributes();
        unset($resultArray['id']);
        unset($resultArray['updated_at']);
        unset($resultArray['created_at']);  
        
        $this->assertInstanceOf('\App\Models\Expense',$result);
        $this->assertEquals($expect,$resultArray);  
    }  


     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreateExpensesFromFund_OtherFee_Null()
    {
        //Set 
        $model = MutualFund::first();
        $createData = [
            "fund_id" =>$model->id,    
            "manager_fee" => 10.0,
            "actual_manager_fee" => 10.0,
            "total_expense_ratio" => 10.0,
            "trustee_fee" => 10.0,
            "actual_trustee_fee" => 10.0,
            "registrar_fee" => 10.0,
            "actual_registrar_fee" => 10.0,
            "other_fee" => null  
        ];

        $model->expenses()->create($createData);

        //Assert
        $result = $model->expenses->where('other_fee','=',null)->first(); 
        $this->assertNull($result);
    }
          

    public function testCreateDividendPaymentsFromFund_NotNull()
    {
        //Set 
        $model = MutualFund::first();
        $expect = [   
            "fund_id" =>$model->id,  
            "payment_date" => "2017-12-12",
            "dividend_price" => 9999.0
        ];

        $model->dividend_payments()->create($expect);

        //Assert
        $result = $model->dividend_payments->where('dividend_price','=', 9999.0 )->first();
        $resultArray = $result->getAttributes();
        unset($resultArray['id']);
        unset($resultArray['updated_at']);
        unset($resultArray['created_at']);  
        
        $this->assertInstanceOf('\App\Models\DividendPayment',$result);
        $this->assertEquals($expect,$resultArray);  
    }  


     /**
      * @expectedException Illuminate\Database\QueryException 
      * @expectedExceptionMessage Trying to get property of non-object
      */
    public function testCreateDividendPaymentsFromFund_DividendPrice_Null()
    {
        //Set 
        $model = MutualFund::first();
        $createData = [
            "fund_id" =>$model->id,    
            "payment_date" => "2017-12-12",
            "dividend_price" => null
        ];

        $model->dividend_payments()->create($createData);

        //Assert
        $result = $model->dividend_payments->where('dividend_price','=',null)->first(); 
        $this->assertNull($result);
    }
          
}
