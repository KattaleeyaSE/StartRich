<?php

namespace App\Http\Controllers\Member;

use App\user_favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Service Container
use App\IRepositories\IMemberRepository;

//Request Validation
use App\Http\Requests\MemberStoreCrudRequest as StoreRequest;
use App\Http\Requests\MemberUpdateCrudRequest as UpdateRequest;
use function Symfony\Component\VarDumper\Tests\Caster\reflectionParameterFixture;

class MemberController extends Controller
{
    private $memberRepository;
    public function __construct(IMemberRepository $memberRepository)
    {
        $this->middleware('auth.member');
        $this->memberRepository = $memberRepository;
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
        $member = $this->memberRepository->find(\Auth::user()->member->id);

        return view('member.edit', 
            [
                'member' => $member,
            ]
        );
    }

    public function fav(){
        $member = $this->memberRepository->find(\Auth::user()->member->id);
$temp= new user_favorite();
$temp->user_id=$member->id;
$temp->invest_id=request('invest_id');
$temp->save();

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

        // update the row in the db
        $item = $this->memberRepository->update(\Auth::user()->member->id,$request);
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
        $member = $this->memberRepository->find(\Auth::user()->member->id);

        return view('member.show', $member);
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
