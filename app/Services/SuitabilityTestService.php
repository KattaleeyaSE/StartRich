<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\SuitabilityTest;
//Service Container 
use App\IServices\ISuitabilityTestService;
class SuitabilityTestService implements ISuitabilityTestService
{
    public function create_test(Request $request)
    {
        //Adjust Data
        $newRequest = new Request();
        $newRequest->offsetSet('name',$request->question_name);
        $newRequest->offsetSet('description',$request->description);
        $newRequest->offsetSet('amc_id',$request->amc_id);

        // insert item in the db
        $suitabilityTest = SuitabilityTest::create($newRequest->all()); 


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
                    SuitabilityAsset::create($newRequest->all());
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

                $suitabilityTestResult = SuitabilityTestResult::create($newRequest->all());     

                if(isset($result['asset']) && !is_null($result['asset']))
                {
                    foreach($result['asset'] as  $key => $item)
                    {  
                        $suit_test = $suitabilityTest->suitability_test_assets; 
                        $newRequest = new Request(); 
                        $newRequest->offsetSet('suitability_result_id',$suitabilityTestResult->id);
                        $newRequest->offsetSet('suitability_asset_id',$suit_test[$key]->id);
                        $newRequest->offsetSet('percent',$item['allocate']);
                        SuitabilityAssetTest::create($newRequest->all()); 
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

                $suitabilityTestQuestion = SuitabilityQuestion::create($newRequest->all()); 

                if(!is_null($question['answers']) && !is_null($suitabilityTestQuestion))
                {
                        foreach($question['answers'] as $answer)
                        {

                            //Adjust Data
                            $newRequest = new Request(); 
                            $newRequest->offsetSet('answer',$answer['answer']);               
                            $newRequest->offsetSet('score',$answer['score']);               
                            $newRequest->offsetSet('suitability_question_id', $suitabilityTestQuestion->id);            

                            $suitabilityTestAnswer = SuitabilityQuestionAnswer::create($newRequest->all()); 
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
        $s = SuitabilityTest::find($request->id);

        $s->update($newRequest->all()); 
        $suitabilityTest = SuitabilityTest::find($request->id);

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
                $s = SuitabilityAsset::find($asset['id']);
                $s->delete();
            }  
        }

        if(isset($request->removeResult) && !is_null($request->removeResult))
        {
            foreach($request->removeResult as $result)
            {
                $s = SuitabilityTestResult::find($result['id']);
                $s->delete();
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
                    SuitabilityAsset::create($newRequest->all());
                }
                else{
                    
                    $newRequest = new Request();  
                    $newRequest->offsetSet('name',$asset['name']);
                    $s = SuitabilityAsset::find($asset['id']);
                    $s->update($request->all());
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
                    $s = SuitabilityTestResult::find($result['id']);
                    $s->update($newRequest->all()); 
                   $suitabilityTestResult = SuitabilityTestResult::find($result['id']); 

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
                    $suitabilityTestResult = SuitabilityTestResult::create($newRequest->all()); 

                }  

                if(isset($result['asset']) && !is_null($result['asset']))
                {   
                    $ss = array();

                    $asset_id = 0;
                    $result_id = $suitabilityTestResult->id;

                    if($asset_id == 0 && $result_id == 0)
                    {
                        $ss = SuitabilityAssetTest::all();
                    }
                    else if($asset_id == 0 &&$result_id > 0)
                    {
                        $ss = SuitabilityAssetTest::where('suitability_result_id','=',$result_id)->get();
                    }
                    else
                    {
                        $ss = SuitabilityAssetTest::where('suitability_asset_id','=',$asset_id)->where('suitability_result_id','=',$result_id)->get();
                    }


                    foreach( $ss as $item)
                    {
                        $s = SuitabilityAssetTest::find($item->id); 
                        $s->delete();
                    }

                    foreach($result['asset'] as  $key => $item)
                    {  
                        $suit_test = $suitabilityTest->suitability_test_assets;    
                        $newRequest = new Request(); 
                        $newRequest->offsetSet('suitability_result_id',$suitabilityTestResult->id);
                        $newRequest->offsetSet('suitability_asset_id',$suit_test[$key]->id);
                        $newRequest->offsetSet('percent',$item['allocate']); 
                        SuitabilityAssetTest::create($newRequest->all()); 
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
                $s = SuitabilityQuestion::find($question['id']); 
                $s->delete();
            }  
        }

        if(isset($request->removeAnswer) && !is_null($request->removeAnswer))
        {
            foreach($request->removeAnswer as $answer)
            {
                $s = SuitabilityQuestionAnswer::find($answer['id']);
                $s->delete(); 
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

                    $suitabilityTestQuestion = SuitabilityQuestion::find($question['id']);

                    $s = SuitabilityQuestion::find($question['id']); 
                    $s->update($newRequest->all());

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

                                    $s = SuitabilityQuestionAnswer::find($answer['id']);
                                    $s->update($newRequest->all());
                                }
                                else
                                {
                                    //Adjust Data
                                    $newRequest = new Request(); 
                                    $newRequest->offsetSet('answer',$answer['answer']);               
                                    $newRequest->offsetSet('score',$answer['score']);
                                    $newRequest->offsetSet('suitability_question_id', $suitabilityTestQuestion->id);    

                                    $suitabilityTestAnswer = SuitabilityQuestionAnswer::create($newRequest->all()); 
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

                    $suitabilityTestQuestion = SuitabilityQuestion::create($newRequest->all()); 

                    if(!is_null($question['answers']) && !is_null($suitabilityTestQuestion))
                    {
                            foreach($question['answers'] as $answer)
                            {

                                //Adjust Data
                                $newRequest = new Request(); 
                                $newRequest->offsetSet('answer',$answer['answer']);               
                                $newRequest->offsetSet('score',$answer['score']);               
                                $newRequest->offsetSet('suitability_question_id', $suitabilityTestQuestion->id);            

                                $suitabilityTestAnswer = SuitabilityQuestionAnswer::create($newRequest->all()); 
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
        $test = SuitabilityTest::find($data['test_id']);
        $suit_member = null;
        if(!is_null($test))
        {
            $score = 0;

            $suit_member_request = new Request(); 
            $suit_member_request->offsetSet('score', $score);
            $suit_member_request->offsetSet('suitability_test_id', $data['test_id']);
            $suit_member_request->offsetSet('member_id', $data['test_member_id']);

            $suit_member = SuitabilityTestMember::create($suit_member_request->all());

            foreach($test->suitability_test_questions as $key => $question)
            {
                $answer_id = $data['q_'.$question->id];
                $suit_member_answer_request = new Request();
                $suit_member_answer_request->offsetSet('suit_member_answer_id', $answer_id);
                $suit_member_answer_request->offsetSet('suit_test_member_id', $suit_member->id);

                $answer =  SuitabilityQuestionAnswer::find($answer_id); 
             
                $score  += $answer->score; 

                $suit_member_answer = SuitabilityTestMemberAnswer::creaet($suit_member_answer_request->all());
            } 

            $suit_member_request = new Request();
            $suit_member_request->offsetSet('score',  $score); 
    
            $s = SuitabilityTestMember::find($suit_member->id);
            $s->update($suit_member_request->all());

            $suit_member =  SuitabilityTestMember::find($suit_member->id);
        }

        return $suit_member ;
    }

     public function get_test_result($id)
     {        
         $suit_member = SuitabilityTestMember::find($id);
         $suit_test = SuitabilityTest::find($suit_member->suitability_test_id);
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
        $test = SuitabilityTest::find($request->test_id);
        $suit_member = null;
        $result = null;
        if(!is_null($test))
        {
            $score = 0; 
          
            foreach($test->suitability_test_questions as $key => $question)
            {
                $answer_id = $request['q_'.$question->id]; 

                $answer =  SuitabilityQuestionAnswer::find($answer_id); 

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