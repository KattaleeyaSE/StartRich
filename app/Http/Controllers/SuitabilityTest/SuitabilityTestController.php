<?php

namespace App\Http\Controllers\SuitabilityTest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IRepositories\ISuitabilityTestRepository;

//Request Validation
use App\Http\Requests\SuitablityTestStoreCrudRequest as StoreRequest;
use App\Http\Requests\SuitablityTestUpdateCrudRequest as UpdateRequest;

class SuitabilityTestController extends Controller
{
    private $suitabilityTestRepository;

    public function __construct(ISuitabilityTestRepository $suitabilityTestRepository)
    {
        $this->suitabilityTestRepository = $suitabilityTestRepository;
    }

    /**
     * Display all rows in the database for this entity.
     *
     * @return Response
     */
    public function index()
    {
        if(\Auth::check())
        {
            if(!is_null(\Auth::user()->member))
            {

            }
            else if(!is_null(\Auth::user()->amc)){

                $suitabilityTests = $this->suitabilityTestRepository->all_by_amc_id_pagination(\Auth::user()->amc->id,15);

                return view('suitability_test.amc.index', 
                    [
                        'suitabilityTests' => $suitabilityTests,
                    ]
                );
            }

        }

        return \Redirect('/');
    }

    // /**
    //  * Show the form for creating inserting a new row.
    //  *
    //  * @return Response
    //  */
    // public function create()
    // {
    //     $this->crud->hasAccessOrFail('create');

    //     // prepare the fields you need to show
    //     $this->data['crud'] = $this->crud;
    //     $this->data['saveAction'] = $this->getSaveAction();
    //     $this->data['fields'] = $this->crud->getCreateFields();
    //     $this->data['title'] = trans('backpack::crud.add').' '.$this->crud->entity_name;

    //     // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
    //     return view($this->crud->getCreateView(), $this->data);
    // }

    // /**
    //  * Store a newly created resource in the database.
    //  *
    //  * @param StoreRequest $request - type injection used for validation using Requests
    //  *
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function storeCrud(StoreRequest $request = null)
    // {
    //     $this->crud->hasAccessOrFail('create');

    //     // fallback to global request instance
    //     if (is_null($request)) {
    //         $request = \Request::instance();
    //     }

    //     // replace empty values with NULL, so that it will work with MySQL strict mode on
    //     foreach ($request->input() as $key => $value) {
    //         if (empty($value) && $value !== '0') {
    //             $request->request->set($key, null);
    //         }
    //     }

    //     // insert item in the db
    //     $item = $this->crud->create($request->except(['save_action', '_token', '_method']));
    //     $this->data['entry'] = $this->crud->entry = $item;

    //     // show a success message
    //     \Alert::success(trans('backpack::crud.insert_success'))->flash();

    //     // save the redirect choice for next time
    //     $this->setSaveAction();

    //     return $this->performSaveAction($item->getKey());
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param int $id
    //  *
    //  * @return Response
    //  */
    // public function edit()
    // {
    //     if(\Auth::check() && !is_null(\Auth::user()->member))
    //     {
    //         $member = $this->memberRepository->find(\Auth::user()->member->id);

    //         return view('member.edit', 
    //             [
    //                 'member' => $member,
    //             ]
    //         );
    //     }

    //     return \Redirect('/');
    // }

    // /**
    //  * Update the specified resource in the database.
    //  *
    //  * @param UpdateRequest $request - type injection used for validation using Requests
    //  *
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function update(UpdateRequest $request)
    // {
    //     if(\Auth::check() && !is_null(\Auth::user()->member))
    //     {
    //         // fallback to global request instance
    //         if (is_null($request)) {
    //             $request = \Request::instance();
    //         }

    //         // replace empty values with NULL, so that it will work with MySQL strict mode on
    //         foreach ($request->input() as $key => $value) {
    //             if (empty($value) && $value !== '0') {
    //                 $request->request->set($key, null);
    //             }
    //         }

    //         // update the row in the db
    //         $item = $this->memberRepository->update(\Auth::user()->member->id,$request);
    //         return \Redirect('member/profile');            
    //     }
        
    //     return \Redirect('/');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  *
    //  * @return Response
    //  */
    // public function show()
    // {
    //     if(\Auth::check() && !is_null(\Auth::user()->member))
    //     {
    //         $member = $this->memberRepository->find(\Auth::user()->member->id);

    //         return view('member.show', $member);
    //     }

    //     return \Redirect('/');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param int $id
    //  *
    //  * @return string
    //  */
    // public function destroy($id)
    // {
    //     $this->crud->hasAccessOrFail('delete');

    //     return $this->crud->delete($id);
    // }

}
