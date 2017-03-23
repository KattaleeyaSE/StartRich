<?php

namespace App\Http\Controllers\SuitabilityTest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IRepositories\ISuitabilityTestRepository;

//Request Validation
use App\Http\Requests\SuitablityTestStoreCrudRequest as StoreRequest;
use App\Http\Requests\SuitablityTestUpdateCrudRequest as UpdateRequest;

class SuitabilityTestMemberController extends Controller
{
    private $suitabilityTestRepository;

    public function __construct(ISuitabilityTestRepository $suitabilityTestRepository)
    {
        $this->middleware('auth.member');
        $this->suitabilityTestRepository = $suitabilityTestRepository;
    }

    /**
     * Display all rows in the database for this entity.
     *
     * @return Response
     */
    public function index()
    {
        //$suitabilityTests = $this->suitabilityTestRepository->all_by_amc_id_pagination(2,15);

        return view('suitability_test.member.index', 
            [
                'suitabilityTests' => [],
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
        $suitabilityTests = $this->suitabilityTestRepository->all_pagination(15);

        return view('suitability_test.member.alltest', 
            [
                'suitabilityTests' => $suitabilityTests,
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
        $test = $this->suitabilityTestRepository->find($id);

        return view('suitability_test.amc.show', ["test" => $test]);
    }
}
