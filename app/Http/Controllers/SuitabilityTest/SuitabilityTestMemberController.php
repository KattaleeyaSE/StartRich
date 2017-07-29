<?php

namespace App\Http\Controllers\SuitabilityTest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IServices\ISuitabilityTestService;

//Request Validation
use App\Http\Requests\SuitablityTestStoreCrudRequest as StoreRequest;
use App\Http\Requests\SuitablityTestUpdateCrudRequest as UpdateRequest;

class SuitabilityTestMemberController extends Controller
{
    private $suitabilityTestService;

    public function __construct(
            ISuitabilityTestService $suitabilityTestService
        )
    {
        $this->middleware('auth.member');
        $this->suitabilityTestService = $suitabilityTestService;
    }

    /**
     * Display all rows in the database for this entity.
     *
     * @return Response
     */
    public function index()
    {
        $suitabilityTests = SuitabilityTestMember::where('member_id', \Auth::user()->member->id)->with( 'member' )->paginate(15);
        if(!is_null($suitabilityTests) && sizeof($suitabilityTests) > 0)
        {
            foreach($suitabilityTests as $item)
            {
                //$test = SuitabilityTestMember::find($item->suitability_test_id);
                
                $item->offsetSet('company_name',$test->amc->company_name);
                $item->offsetSet('name',$test->name);
            }
        }
        return view('suitability_test.member.index', 
            [
                'suitabilityTests' => $suitabilityTests,
            ]
        ); 
    }


    /**
     * Display all rows in the database for this entity.
     *
     * @return Response
     */
    public function all_test()
    {
        $suitabilityTests = SuitabilityTestMember::paginate(15);

        return view('suitability_test.member.alltest', 
            [
                'suitabilityTests' => $suitabilityTests,
            ]
        ); 
    }    

    /**
     * Display the specified resource.
     * @param int $id
     *
     * @return Response
     */
    public function show_record($id)
    {
        $suitabilityTests = SuitabilityTestMember::find($id);
        $result = $this->suitabilityTestService->get_test_result( $suitabilityTests->id);
        return view('suitability_test.member.result', 
            [
                'suitabilityTests' =>  $suitabilityTests,
                'test_result' =>  $result,
            ]
        ); 
    }    

    /**
     * Display the specified resource.
     * @param int $id
     * @return Response
     */
    public function take_test($id)
    {
        $test = SuitabilityTestMember::find($id);
        return view('suitability_test.member.take_test', ["test" => $test]);
    }

    /**
     * Store a newly created resource in the database.
     *
     * @param StoreRequest $request - type injection used for validation using Requests
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_test(Request $request)
    {
         $test_result = $this->suitabilityTestService->get_temporary_test_result( $request);
       
        if(!is_null($test_result))
        {  
            \Session::put('suitability_test', $request->all());
            return view('suitability_test.member.temp_result', [
                    "test_result" => $test_result,
                ]);
        }else
        {
            return \Redirect('suitabilitytest/member/alltest');
        }

    }  

    /**
     * Store a newly created resource in the database.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function record_test()
    {
         $test_result = \Session::get('suitability_test');
         
        if(!is_null($test_result))
        {  
            $stored_test = $this->suitabilityTestService->create_take_test( $test_result);
 
            // $result = $this->suitabilityTestService->get_test_result( $stored_test->id);
            
            // $result->offsetSet('score',$stored_test->score);

            return \Redirect('suitabilitytest/member/show/'.$stored_test->id);

        }else
        {
            return \Redirect('suitabilitytest/member/alltest');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return string
     */
    public function destroy($id)
    { 
        SuitabilityTestMember::delete($id);

        return \Redirect('/suitabilitytest/member/index'); 
    }       
}
