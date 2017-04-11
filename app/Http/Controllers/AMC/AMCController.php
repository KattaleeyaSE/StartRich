<?php

namespace App\Http\Controllers\AMC;

use App\devidendhistory;
use App\Models\MutualFund;
use App\Models\Nav;
use App\passperformance;
use App\portfolio;
use App\purchasedetail;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IRepositories\IAMCRepository;

//Request Validation
use App\Http\Requests\AMCStoreCrudRequest as StoreRequest;
use App\Http\Requests\AMCUpdateCrudRequest as UpdateRequest;

class AMCController extends Controller
{ 
    private $amcRepository;
    public function __construct(IAMCRepository $amcRepository)
    {
        $this->middleware('auth.amc');        
        $this->amcRepository = $amcRepository;
    }
    

    // /**
    //  * Display all rows in the database for this entity.
    //  *
    //  * @return Response
    //  */
    // public function index()
    // {
    //     $this->crud->hasAccessOrFail('list');

    //     $this->data['crud'] = $this->crud;
    //     $this->data['title'] = ucfirst($this->crud->entity_name_plural);

    //     // get all entries if AJAX is not enabled
    //     if (! $this->data['crud']->ajaxTable()) {
    //         $this->data['entries'] = $this->data['crud']->getEntries();
    //     }
        
    //     // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
    //     return view($this->crud->getListView(), $this->data);
    // }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        $amc = $this->amcRepository->find(\Auth::user()->amc->id);

        return view('AMC.edit', 
            [
                'amc' => $amc,
            ]
        );
    }

    /**
     * Update the specified resource in the database.
     *
     * @param UpdateRequest $request - type injection used for validation using Requests
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request)
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
        
        if(!is_null($request->password))
        {
            $request->offsetSet('password',bcrypt($request->password));
        }
        
        // update the row in the db
        $item = $this->amcRepository->update(\Auth::user()->amc->id,$request);
        return \Redirect('amc/profile');
    }

    /**
     * Display the specified resource.
     *
     *
     * @return Response
     */
    public function show()
    {
        $amc = $this->amcRepository->find(\Auth::user()->amc->id);

        return view('AMC.show', $amc);
    }
    public function getfund(){

return MutualFund::all();

}

public function addnav(){
$nav =new Nav();
    $nav->fund_id=request('fund_id');
    $nav->bid=request('bid');
    $nav->standard=request('standard');
    $nav->offer=request('offer');
$nav->save();
redirect('/');
    }

    public function shareholder(){
    $share=new portfolio();

    $share->fund_id=request('fund_id');
    $share->name=request('name');
    $share->percentage=\request('percentage');
        $share->save();

    }

    public function updateperformance(){
        $temp =new passperformance();
        $temp->fund_id=request('fund_id');
        $temp->return1('return1');
        $temp->return2('return2');
        $temp->return3('return3');
        $temp->return4('return4');
        $temp->return5('return5');
        $temp->return6('return6');
        $temp->return7('return7');
        $temp->return8('return8');
      $temp->save();

    }

    public function updatedevidenhistory(){
        $temp=new devidendhistory();
        $temp->fund_id=request('fund_id');
        $temp->time=request('time');
        $temp->dprice=request('dprice');
        $temp->paydate=request('paydate');
 $temp->save();
    }

    public function updatefee(){
        $temp=new fee();
        $temp->fund_id=request('fund_id');
        $temp->subscribe_period=request('subscribe_period');
        $temp->subscribe_minimum=request('subscribe_minimum');
        $temp->redemtion_period=request('redemtion_period');
        $temp->redemtion_minimum=request('redemtion_minimum');
        $temp->minimum_balance=request('minimum_balance');
        $temp->settlement_period=request('settlement_period');
        $temp->save();


    }
public function purchasedetailadd(){
    $temp=new purchasedetail();
    $temp->fund_id=request('fund_id');

}
//Route::post('/addshareholder','AMC\AMCController@shareholder');
//Route::post('/passperformance','AMC\AMCController@updateperformance');
//Route::post('/updatehistory','AMC\AMCController@updatedevidenhistory');

    public function fund(){

        return view('AMC.fund.index');
    }
    public function fundadd(){

        return view('AMC.fund.add');
    }

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
