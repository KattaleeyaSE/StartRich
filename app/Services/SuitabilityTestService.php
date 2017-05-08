<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\SuitabilityTest;
//Service Container 
use App\IServices\ISuitabilityTestService;
use App\IRepositories\ISuitabilityTestRepository;
use App\IRepositories\ISuitabilityTestMemberRepository;
class SuitabilityTestService implements ISuitabilityTestService
{

    private $suitabilityTestRepository;
    private $suitabilityTestMemberRepository;

    public function __construct(
            ISuitabilityTestRepository $suitabilityTestRepository,
            ISuitabilityTestMemberRepository $suitabilityTestMemberRepository
        )
    { 
        $this->suitabilityTestRepository = $suitabilityTestRepository;
        $this->suitabilityTestMemberRepository = $suitabilityTestMemberRepository;
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
            if(isset($request->assets) && !is_null($request->assets))
            {
                foreach($request->assets as $asset)
                {
                    $newRequest = new Request(); 
                    $newRequest->offsetSet('name',$asset['name']);
                    $newRequest->offsetSet('suitability_test_id',$suitabilityTest->id);
                    $this->suitabilityTestRepository->create_asset($newRequest);
                }
            } 
            foreach($request->results as $result)
            {
                //Adjust Data
                $newRequest = new Request(); 
                $newRequest->offsetSet('max_score',$result['max_score']);
                $newRequest->offsetSet('min_score',$result['min_score']);
                $newRequest->offsetSet('type_of_investors',$result['type_of_investors']);                
                $newRequest->offsetSet('risk_level',$result['risk_level']);                 
                $newRequest->offsetSet('suitability_test_id',$suitabilityTest->id);   
                if(isset($result['funds']['id']) && !is_null($result['funds']['id']))
                {
                    $newRequest->offsetSet('mutual_fund_type_id',$result['funds']['id']);   
                }          

                $suitabilityTestResult = $this->suitabilityTestRepository->create_result($newRequest);     

                if(isset($result['asset']) && !is_null($result['asset']))
                {
                    foreach($result['asset'] as  $key => $item)
                    {  
                        $suit_test = $suitabilityTest->suitability_test_assets; 
                        $newRequest = new Request(); 
                        $newRequest->offsetSet('suitability_result_id',$suitabilityTestResult->id);
                        $newRequest->offsetSet('suitability_asset_id',$suit_test[$key]->id);
                        $newRequest->offsetSet('percent',$item['allocate']);
                        $this->suitabilityTestRepository->create_asset_test($newRequest); 
                    }
                }    
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

    public function update_test (Request $request)
    {
        //Adjust Data
        $newRequest = new Request();
        $newRequest->offsetSet('name',$request->question_name);
        $newRequest->offsetSet('description',$request->description);

        // insert item in the db
        $this->suitabilityTestRepository->update($request->id,$newRequest); 
        $suitabilityTest = $this->suitabilityTestRepository->find($request->id);

        if(!is_null($suitabilityTest))
        {

            $results = $this->update_result($request, $suitabilityTest);
            $questions = $this->update_question_answer($request, $suitabilityTest); 
            
        }

        return $suitabilityTest;
    }

    public function update_result(Request $request,SuitabilityTest $suitabilityTest)
    {
        $results = collect();

        if(isset($request->removeAsset) && !is_null($request->removeAsset))
        {
            foreach($request->removeAsset as $asset)
            {
                 $this->suitabilityTestRepository->delete_asset($asset['id']); 
            }  
        }

        if(isset($request->removeResult) && !is_null($request->removeResult))
        {
            foreach($request->removeResult as $result)
            {
                 $this->suitabilityTestRepository->delete_result($result['id']); 
            }  
        }

        if(isset($request->assets) && !is_null($request->assets))
        {
            foreach($request->assets as $asset)
            {
                if($asset['id'] == 0)
                {
                    $newRequest = new Request(); 
                    $newRequest->offsetSet('name',$asset['name']);
                    $newRequest->offsetSet('suitability_test_id',$suitabilityTest->id);
                    $this->suitabilityTestRepository->create_asset($newRequest);
                }
                else{
                    
                    $newRequest = new Request();  
                    $newRequest->offsetSet('name',$asset['name']);
                    $this->suitabilityTestRepository->update_asset($asset['id'],$newRequest);
                }
            }
        }

        if(!is_null($request->results) && !is_null($suitabilityTest))
        {

            foreach($request->results as $result)
            { 
                $suitabilityTestResult;
                
                if($result['id'] > 0)
                {
                    //Adjust Data
                    $newRequest = new Request(); 
                    $newRequest->offsetSet('max_score',$result['max_score']);
                    $newRequest->offsetSet('min_score',$result['min_score']);
                    $newRequest->offsetSet('risk_level',$result['risk_level']);
                    $newRequest->offsetSet('type_of_investors',$result['type_of_investors']);      
                    if(isset($result['funds']['id']) && !is_null($result['funds']['id']))
                    {
                        $newRequest->offsetSet('mutual_fund_type_id',$result['funds']['id']);   
                    }     
                   $this->suitabilityTestRepository->update_result($result['id'],$newRequest); 
                   $suitabilityTestResult = $this->suitabilityTestRepository->find_result($result['id']); 

                }
                else
                {
                    //Adjust Data
                    $newRequest = new Request(); 
                    $newRequest->offsetSet('max_score',$result['max_score']);
                    $newRequest->offsetSet('min_score',$result['min_score']);
                    $newRequest->offsetSet('type_of_investors',$result['type_of_investors']); 
                    $newRequest->offsetSet('risk_level',$result['risk_level']);                                   
                    $newRequest->offsetSet('suitability_test_id',$suitabilityTest->id);            
                    if(isset($result['funds']['id']) && !is_null($result['funds']['id']))
                    {
                        $newRequest->offsetSet('mutual_fund_type_id',$result['funds']['id']);   
                    }  
                    $suitabilityTestResult = $this->suitabilityTestRepository->create_result($newRequest); 

                }  

                if(isset($result['asset']) && !is_null($result['asset']))
                {   
  
                    foreach( $this->suitabilityTestRepository->get_asset_test(0,$suitabilityTestResult->id) as $item)
                    {
                        $this->suitabilityTestRepository->delete_asset_test($item->id); 
                    }

                    foreach($result['asset'] as  $key => $item)
                    {  
                        $suit_test = $suitabilityTest->suitability_test_assets;    
                        $newRequest = new Request(); 
                        $newRequest->offsetSet('suitability_result_id',$suitabilityTestResult->id);
                        $newRequest->offsetSet('suitability_asset_id',$suit_test[$key]->id);
                        $newRequest->offsetSet('percent',$item['allocate']); 
                        $this->suitabilityTestRepository->create_asset_test($newRequest); 
                    }
                }
               
            }

            $result = $suitabilityTest->suitability_test_results;
        }

        return $results;
    }

    public function update_question_answer(Request $request,SuitabilityTest $suitabilityTest)
    {
        $questions = collect();

        if(isset($request->removeQuestion) && !is_null($request->removeQuestion))
        {
            foreach($request->removeQuestion as $question)
            {
                 $this->suitabilityTestRepository->delete_question($question['id']); 
            }  
        }

        if(isset($request->removeAnswer) && !is_null($request->removeAnswer))
        {
            foreach($request->removeAnswer as $answer)
            {
                 $this->suitabilityTestRepository->delete_answer($answer['id']); 
            }  
        }

        if(!is_null($request->questions) && !is_null($suitabilityTest))
        {
            foreach($request->questions as $question)
            {
                if($question['id'] > 0)
                {
                    //Adjust Data
                    $newRequest = new Request(); 
                    $newRequest->offsetSet('question',$question['question']);            

                    $suitabilityTestQuestion = $this->suitabilityTestRepository->find_question($question['id']);

                    $this->suitabilityTestRepository->update_question($question['id'],$newRequest); 

                    if(!is_null($question['answers']) && !is_null($suitabilityTestQuestion))
                    {
                            foreach($question['answers'] as $answer)
                            {
                                if($answer['id'] > 0)
                                {
                                    //Adjust Data
                                    $newRequest = new Request(); 
                                    $newRequest->offsetSet('answer',$answer['answer']);               
                                    $newRequest->offsetSet('score',$answer['score']);

                                    $this->suitabilityTestRepository->update_answer($answer['id'],$newRequest);
                                }
                                else
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
                else
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

            $questions  = $suitabilityTest->suitability_test_questions;

        }   
        return $questions;
    }
  
    public function create_take_test(array $data)
    {
        $test = $this->suitabilityTestRepository->find($data['test_id']);
        $suit_member = null;
        if(!is_null($test))
        {
            $score = 0;

            $suit_member_request = new Request(); 
            $suit_member_request->offsetSet('score', $score);
            $suit_member_request->offsetSet('suitability_test_id', $data['test_id']);
            $suit_member_request->offsetSet('member_id', $data['test_member_id']);

            $suit_member = $this->suitabilityTestMemberRepository->create($suit_member_request);

            foreach($test->suitability_test_questions as $key => $question)
            {
                $answer_id = $data['q_'.$question->id];
                $suit_member_answer_request = new Request();
                $suit_member_answer_request->offsetSet('suit_member_answer_id', $answer_id);
                $suit_member_answer_request->offsetSet('suit_test_member_id', $suit_member->id);

                $answer =  $this->suitabilityTestRepository->find_answer($answer_id); 

                $score  += $answer->score; 

                $suit_member_answer = $this->suitabilityTestMemberRepository->create_answer($suit_member_answer_request);
            } 

            $suit_member_request = new Request();
            $suit_member_request->offsetSet('score',  $score); 
 
            $this->suitabilityTestMemberRepository->update($suit_member->id,$suit_member_request);
        }

        return $suit_member ;
    }

     public function get_test_result($id)
     {        
         $suit_member = $this->suitabilityTestMemberRepository->find($id);
         $suit_test = $this->suitabilityTestRepository->find($suit_member->suitability_test_id);
         $result = null;
         
         if(
             $suit_test != null 
             && $suit_member->score > 0 
             && sizeof($suit_test->suitability_test_results) > 0
            )
         {
            foreach($suit_test->suitability_test_results as $key => $item)
            { 
               if($suit_member->score >= $item->min_score && $suit_member->score <= $item->max_score )
               {
                    $result = $item;
                    break;
               }
            }
         }

         return $result;
     }


     public function get_temporary_test_result(Request $request)
     {        
        $test = $this->suitabilityTestRepository->find($request->test_id);
        $suit_member = null;
        $result = null;
        if(!is_null($test))
        {
            $score = 0; 
          
            foreach($test->suitability_test_questions as $key => $question)
            {
                $answer_id = $request['q_'.$question->id]; 

                $answer =  $this->suitabilityTestRepository->find_answer($answer_id); 

                $score  += $answer->score;  
            }  
         
            if( $score > 0 && sizeof($test->suitability_test_results) > 0)
            {
                foreach($test->suitability_test_results as $key => $item)
                { 
                    if($score >= $item->min_score && $score <= $item->max_score )
                    {

                            $result = $item;
                            $result->offsetSet('score', $score);
                            break;
                    }
                }
            } 
        }

         return $result;
     }
    
}