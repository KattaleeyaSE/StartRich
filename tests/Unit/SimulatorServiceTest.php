<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Http\Request;
class SimulatorServiceTest extends TestCase
{
 
    public function testCreateSimulator_NotNull()
    {
        $mockRequest = new Request();
        $mockRequest->offsetSet('buy_date',"2017-04-12");
        $mockRequest->offsetSet('sell_date',"2017-04-30");
        $mockRequest->offsetSet('balance_of_investment',"300");
        $mockRequest->offsetSet('fund_id',"1");

        $service = $this->app->make('App\IServices\ISimulatorService');
        $results = $service->create_simulator($mockRequest);
        $this->assertInstanceOf('\Illuminate\Support\Collection',$results);
        $this->assertTrue(sizeof($results) == 15);
    }


    public function testCreateSimulator_Null()
    {
        $mockRequest = new Request(); 

        $service = $this->app->make('App\IServices\ISimulatorService');
        $results = $service->create_simulator($mockRequest); 
        $this->assertInstanceOf('\Illuminate\Support\Collection',$results);
        $this->assertTrue(sizeof($results) == 0);
    }
}
