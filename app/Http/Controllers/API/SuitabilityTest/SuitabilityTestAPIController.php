<?php

namespace App\Http\Controllers\API\SuitabilityTest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IRepositories\ISuitabilityTestRepository;
use App\IRepositories\IMutualFundRepository;
use App\IServices\ISuitabilityTestService;
 
class SuitabilityTestAPIController extends Controller
{
    private $suitabilityTestRepository;
    private $suitabilityTestService;
    private $mutualFundRepository;

    public function __construct(
            ISuitabilityTestRepository $suitabilityTestRepository,
            ISuitabilityTestService $suitabilityTestService,
            IMutualFundRepository $mutualFundRepository
        )
    { 
        $this->suitabilityTestRepository = $suitabilityTestRepository;
        $this->suitabilityTestService = $suitabilityTestService;
        $this->mutualFundRepository = $mutualFundRepository;
    }    


    public function getFunds()
    {
        //
        try
        { 

            $funds  = $this->mutualFundRepository->all(); 
            $msg= [
                'msg' => 'Success',
                'data' =>   $funds
            ];
            return \Response::Json( $funds ,200); 
        }
        catch(\Exception $e)
        {
            return \Response::Json("Fail : ".$e->getMessage(),404);
        }
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
     * @return Json
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
            return \Response::Json("Fail : ".$e->getMessage(),404);
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
     * @return Json
     */
    public function edit($id)
    {
        //
        try
        {
            // fallback to global request instance
            if ($id == 0) {
                return \Response::Json("Fail",404);
            }

            // // replace empty values with NULL, so that it will work with MySQL strict mode on
            // foreach ($request->input() as $key => $value) {
            //     if (empty($value) && $value !== '0') {
            //         $request->request->set($key, null);
            //     }
            // }

            $test  = $this->suitabilityTestRepository->find($id);

            if(!is_null($test))
            { 
                $assets = [];
                $results = [];
                foreach($test->suitability_test_assets as $asset)
                {
                    array_push($assets,
                        [
                            "id" => $asset->id,
                            "name" => $asset->name, 
                        ]);
                }

                foreach($test->suitability_test_results as $result)
                {
                    $asset = [];
                    foreach($test->suitability_test_assets as $item)
                    {   
                        $assetItems = $this->suitabilityTestRepository->get_asset_test($item->id,$result->id);
 
                        array_push($asset,
                                [
                                    "id" => $assetItems[0]->id,
                                    "allocate" => $assetItems[0]->percent, 
                                ]);
                    }  
                    array_push($results,
                        [
                            "id" => $result->id,
                            "max_score" => $result->max_score,
                            "min_score" => $result->min_score,
                            "type_of_investors" => $result->type_of_investors,
                            "asset" => $asset,
                        ]);
                }
                
                $questions = [];
                foreach($test->suitability_test_questions as $question)
                {
                    $answers = [];
                    foreach($question->suitability_answers as $answer)
                    {
                        array_push( $answers,
                            [
                                "id" => $answer->id,
                                "answer" => $answer->answer,
                                "score" => $answer->score,
                            ]);
                    }

                    array_push($questions,
                        [
                            "id" => $question->id,
                            "question" => $question->question,
                            "answers" => $answers,
                        ]);
                }

                $msg = [
                    "msg" => "Success",
                    "test" => 
                    [
                        "id"  =>  $test->id,
                        "amc_id"  => $test->amc_id,
                        "question_name"  => $test->name,
                        "description"  => $test->description,
                        "results"  => $results,
                        "assets"  => $assets,
                        "questions"  => $questions,
                        "show_create_result"  => true, 
                        "show_add_question"  => false, 
                    ],
                ];

                return \Response::Json($msg,200);

            }else{
                return \Response::Json("Fail",404);
            } 
        }
        catch(\Exception $e)
        {
            return \Response::Json("Fail : ".$e->getMessage(),404);
        }       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Json
     */
    public function update(Request $request)
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

            $test  = $this->suitabilityTestService->update_test($request);

            if(!is_null($test))
            {
                return \Response::Json("Success",200);

            }else{
                return \Response::Json("Fail",404);
            } 
        }
        catch(\Exception $e)
        {
            return \Response::Json("Fail : ".$e->getMessage(),404);
        }
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
