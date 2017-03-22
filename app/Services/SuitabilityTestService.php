<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\SuitabilityTest;
use App\IServices\ISuitabilityTestService;
//Service Container
use App\IRepositories\ISuitabilityTestRepository;
class SuitabilityTestService implements ISuitabilityTestService
{

    private $suitabilityTestRepository;

    public function __construct(ISuitabilityTestRepository $suitabilityTestRepository)
    { 
        $this->suitabilityTestRepository = $suitabilityTestRepository;
    }    

    public function create_test(Request $request)
    {
        //Adjust Data
        $newRequest = new Request();
        $newRequest->offsetSet('name',$request->question_name);
        $newRequest->offsetSet('description',$request->description);
        $newRequest->offsetSet('amc_id',$request->amc_id);

        // insert item in the db
        $suitabilityTest = $this->suitabilityTestRepository->create($newRequest); 


        if(!is_null($suitabilityTest))
        {

            $results = $this->create_result($request, $suitabilityTest);
            $questions = $this->create_question_answer($request, $suitabilityTest);
            
        }

        return $suitabilityTest;
    }

    public function create_result(Request $request,SuitabilityTest $suitabilityTest)
    {
        $results = collect();
        if(!is_null($request->results) && !is_null($suitabilityTest))
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

            $result = $suitabilityTest->suitability_test_results();
        }

        return $results;
    }

    public function create_question_answer(Request $request,SuitabilityTest $suitabilityTest)
    {
        $questions = collect();
 
        if(!is_null($request->questions) && !is_null($suitabilityTest))
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

            $questions  = $suitabilityTest->suitability_test_questions();

        }   
        return $questions;
    }
}