<?php

namespace App\Http\Controllers\Admin\User;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AMCStoreCrudRequest as StoreRequest;
use App\Http\Requests\AMCUpdateCrudRequest as UpdateRequest;

//Service Container
use App\IRepositories\IAMCRepository;

class AMCCrudController extends CrudController
{

    private $amcRepository;
    public function __construct(IAMCRepository $amcRepository)
    {
        $this->amcRepository = $amcRepository;
        parent::__construct();
    }
    
    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\AMC");
        $this->crud->setRoute("admin/amc");
        $this->crud->setEntityNameStrings('amc', 'amcs');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->addColumns([
            [
                'name'  => 'company_name',
                'label' => 'Company Name',
                'type'  => 'text',
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
        $this->crud->allowAccess(['list', 'create', 'delete', 'show']);
        $this->crud->denyAccess([ 'update', 'reorder']);
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
            $this->data['entries'] = $this->amcRepository->all();
        }
        
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getListView(), $this->data);
    }

    /**
     * Show the form for creating inserting a new row.
     *
     * @return Response
     */
    public function create()
    {
        $this->crud->hasAccessOrFail('create');

        // prepare the fields you need to show

        //Set Field to Show
        $this->crud->addFields(
        [ 
            [
                'name'  => 'company_name',
                'label' => 'Company Name',
                'type'  => 'text',     
            ],
            [
                'name'  => 'username',
                'label' => 'Username',
                'type'  => 'text',
            ],
            [
                'name'  => 'password',
                'label' => 'Password',
                'type'  => 'password'
            ],
            [
                "name" => "password_confirmation",
                "label" => "Password Confirmation", 
                "type" => "password", 
            ],
            [
                'name'  => 'phone_number',
                'label' => 'Phone Number',
                'type'  => 'text',
            ],            
            [
                'name'  => 'email',
                'label' => 'Email',
                'type'  => 'text',
            ],
            [
                'name'  => 'address',
                'label' => 'Address',
                'type'  => 'textarea',
            ]
        ], 'create');

        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getCreateFields();
        $this->data['title'] = trans('backpack::crud.add').' '.$this->crud->entity_name;

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getCreateView(), $this->data);
    }

	public function store(StoreRequest $request)
	{
        $this->crud->hasAccessOrFail('create');

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

        // insert item in the db
        $item = $this->amcRepository->create($request);

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($item->getKey());
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

        $amc = $this->amcRepository->find($id);

        //Set Field to Show
        $this->crud->addFields(
        [ 
            [
                'name'  => 'company_name',
                'label' => 'Company Name',
                'type'  => 'text',  
                'value' => $amc->company_name   
            ],
            [
                'name'  => 'username',
                'label' => 'Username',
                'type'  => 'text',
                'value' => $amc->user->username
            ],
            // [
            //     'name'  => 'password',
            //     'label' => 'Password',
            //     'type'  => 'password'
            // ],
            // [
            //     "name" => "password_confirmation",
            //     "label" => "Password Confirmation", 
            //     "type" => "password", 
            // ],
            [
                'name'  => 'phone_number',
                'label' => 'Phone Number',
                'type'  => 'text',
                'value' => $amc->phone_number                
            ],            
            [
                'name'  => 'email',
                'label' => 'Email',
                'type'  => 'text',
                'value' => $amc->user->email                
            ],
            [
                'name'  => 'address',
                'label' => 'Address',
                'type'  => 'textarea',
                'value' => $amc->address              
            ]
        ], 'update');

        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['title'] = trans('backpack::crud.preview').' '.$this->crud->entity_name;

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

        return \Response::json($this->amcRepository->delete($id));
    }

}
