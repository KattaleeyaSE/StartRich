<?php

namespace App\Http\Controllers\API\SuitabilityTest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IRepositories\ISuitabilityTestRepository;

class SuitabilityTestAPIController extends Controller
{
    private $suitabilityTestRepository;

    public function __construct(ISuitabilityTestRepository $suitabilityTestRepository)
    { 
        $this->suitabilityTestRepository = $suitabilityTestRepository;
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
        // fallback to global request instance
        if (is_null($request)) {
            $request = \Request::instance();
        }

        // replace empty values with NULL, so that it will work with MySQL strict mode on
        foreach ($request->input() as $key => $value) {
            if (empty($value) && $value !== '0') {
                $request->request->set($key, null);
            }
        }

        //Adjust Data
        $newRequest = new Request();
        $newRequest->offsetSet('name',$request->question_name);
        $newRequest->offsetSet('description',$request->description);
        $newRequest->offsetSet('amc_id',$request->amc_id);

        // insert item in the db
        $suitabilityTest = $this->suitabilityTestRepository->create($newRequest); 
        if(!is_null($suitabilityTest))
        {
            if(!is_null($request->results))
            {
                foreach($request->results as $result)
                {
                    //Adjust Data
                    $newRequest = new Request(); 
                    $newRequest->offsetSet('max_score',$result['max_score']);
                    $newRequest->offsetSet('min_score',$result['min_score']);
                    $newRequest->offsetSet('type_of_investors',$result['type_of_investors']);                
                    $newRequest->offsetSet('suitability_test_id',$suitabilityTest->id);            

                    $suitabilityTestResult = $this->suitabilityTestRepository->create_result($newRequest); 

                }

            }

            if(!is_null($request->questions))
            {
                foreach($request->questions as $question)
                {
                    //Adjust Data
                    $newRequest = new Request(); 
                    $newRequest->offsetSet('question',$question['question']);               
                    $newRequest->offsetSet('suitability_test_id',$suitabilityTest->id);            

                    $suitabilityTestQuestion = $this->suitabilityTestRepository->create_question($newRequest); 

                    if(!is_null($question['answers']) && !is_null($suitabilityTestQuestion))
                    {
                            foreach($question['answers'] as $answer)
                            {

                                //Adjust Data
                                $newRequest = new Request(); 
                                $newRequest->offsetSet('answer',$answer['answer']);               
                                $newRequest->offsetSet('score',$answer['score']);               
                                $newRequest->offsetSet('suitability_question_id', $suitabilityTestQuestion->id);            

                                $suitabilityTestAnswer = $this->suitabilityTestRepository->create_answer($newRequest); 
                            }
                    }

                }

            }   
        }
        

        return \Response::Json("Success",200);
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
