<?php

namespace App\Http\Controllers\AMC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Request Validation
use App\Http\Requests\AMCStoreCrudRequest as StoreRequest;
use App\Http\Requests\AMCUpdateCrudRequest as UpdateRequest;

class AMCController extends Controller
{ 

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        $amc = AMC::find(\Auth::user()->amc->id);

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
        $item = AMC::update(\Auth::user()->amc->id,$request);
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
        $amc = AMC::find(\Auth::user()->amc->id);

        return view('AMC.show', $amc);
    }

    public function fund(){

        return view('AMC.fund.index');
    }
    public function fundadd(){

        return view('AMC.fund.add');
    }
 
}
