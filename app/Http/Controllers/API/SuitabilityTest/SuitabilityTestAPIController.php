<?php

namespace App\Http\Controllers\API\SuitabilityTest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IRepositories\ISuitabilityTestRepository;
use App\IServices\ISuitabilityTestService;

class SuitabilityTestAPIController extends Controller
{
    private $suitabilityTestRepository;
    private $suitabilityTestService;

    public function __construct(
            ISuitabilityTestRepository $suitabilityTestRepository,
            ISuitabilityTestService $suitabilityTestService
        )
    { 
        $this->suitabilityTestRepository = $suitabilityTestRepository;
        $this->suitabilityTestService = $suitabilityTestService;
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        try
        {
            // fallback to global request instance
            if (is_null($request)) {
                return \Response::Json("Fail",404);
            }

            // // replace empty values with NULL, so that it will work with MySQL strict mode on
            // foreach ($request->input() as $key => $value) {
            //     if (empty($value) && $value !== '0') {
            //         $request->request->set($key, null);
            //     }
            // }

            $test  = $this->suitabilityTestService->create_test($request);

            if(!is_null($test))
            {
                return \Response::Json("Success",200);

            }else{
                return \Response::Json("Fail",404);
            } 
        }
        catch(\Exception $e)
        {
            return \Response::Json("Fail",404);
        }

     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
