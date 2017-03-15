<?php

namespace App\Http\Controllers\Admin\User;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MemberStoreRequest as StoreRequest;
use App\Http\Requests\MemberUpdateRequest as UpdateRequest;

//Service Container
use App\IRepositories\IMemberRepository;

class MemberCrudController extends CrudController
{

    private $memberRepository;
    public function __construct(IMemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
        parent::__construct();
    }

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Member");
        $this->crud->setRoute("admin/member");
        $this->crud->setEntityNameStrings('member', 'members');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        //$this->crud->setFromDb();
        $this->crud->addColumns([
            [
                'label'     => 'Username', // Table column heading
                'type'      => 'select',
                'name'      => 'user_id', // the id that defines the relationship in your Model
                'entity'    => 'user', // the method that defines the relationship in your Model
                'attribute' => 'username', // foreign key attribute that is shown to user
                'model'     => "App\Models\User", // foreign key model
            ],     
            [
                'label'     => 'Email', // Table column heading
                'type'      => 'select',
                'name'      => 'user_id', // the id that defines the relationship in your Model
                'entity'    => 'user', // the method that defines the relationship in your Model
                'attribute' => 'email', // foreign key attribute that is shown to user
                'model'     => "App\Models\User", // foreign key model
            ],  
            [
                'name'  => 'phone_number',
                'label' => 'Phone Number',
                'type'  => 'text',
            ],           
        ]);

        // ------ CRUD ACCESS
        $this->crud->allowAccess(['list','reorder', 'delete','show']);
        $this->crud->denyAccess(['create', 'update']);

    }
   /**
     * Display all rows in the database for this entity.
     *
     * @return Response
     */
    public function index()
    {
        $this->crud->hasAccessOrFail('list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst($this->crud->entity_name_plural);

        // get all entries if AJAX is not enabled
        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->memberRepository->all();
        }

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getListView(), $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->crud->hasAccessOrFail('show');

        // get the info for that entry
        $this->data['entry'] = $this->memberRepository->find($id);
        $this->data['crud'] = $this->crud;
        $this->data['title'] = trans('backpack::crud.preview').' '.$this->crud->entity_name;

        //Set Field to Show
        $this->crud->addFields(
        [ 
            [
                'name'  => 'username',
                'label' => 'Username',
                'type'  => 'text',
                'value' => $this->data['entry']->user->username             
            ],
            [
                'name'  => 'firstname',
                'label' => 'Firstname',
                'type'  => 'text',
                'value' => $this->data['entry']->firstname
            ],
            [
                'name'  => 'lastname',
                'label' => 'Lastname',
                'type'  => 'text',
                'value' => $this->data['entry']->lastname  
            ],
            [
                'name'  => 'email',
                'label' => 'Email',
                'type'  => 'email',
                'value' => $this->data['entry']->user->email    
            ],
            [
                'name'  => 'phone_number',
                'label' => 'Phone Number',
                'type'  => 'text',
                'value' => $this->data['entry']->phone_number  
            ]
        ], 'edit');

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getShowView(), $this->data);
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
        $this->crud->hasAccessOrFail('delete');

        return \Response::json($this->memberRepository->delete($id));
    }

	// public function store(StoreRequest $request)
	// {
	// 	// your additional operations before save here
    //     $redirect_location = parent::storeCrud();
    //     // your additional operations after save here
    //     // use $this->data['entry'] or $this->crud->entry
    //     return $redirect_location;
	// }

	// public function update(UpdateRequest $request)
	// {
	// 	// your additional operations before save here
    //     $redirect_location = parent::updateCrud();
    //     // your additional operations after save here
    //     // use $this->data['entry'] or $this->crud->entry
    //     return $redirect_location;
	// }
}
