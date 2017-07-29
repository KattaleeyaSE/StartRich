<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Request Validation
use App\Http\Requests\MemberStoreCrudRequest as StoreRequest;
use App\Http\Requests\MemberUpdateCrudRequest as UpdateRequest;
use App\Models\Member;

class MemberController extends Controller
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
        $member = Member::find(\Auth::user()->member->id);

        return view('member.edit', 
            [
                'member' => $member,
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
        $member = AMC::find($id);
        $user = $member->user;
        $user->update($request->all());
        $member->update($request->all());
    
        return \Redirect('member/profile');      
    }

    /**
     * Display the specified resource.
     *
     *
     * @return Response
     */
    public function show()
    {
        $member = Member::find(\Auth::user()->member->id);

        return view('member.show', $member);
    }
 
}
